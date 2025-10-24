<?php

namespace App\Orchid\Layouts\blog;

use App\Models\Blog;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BlogListLayout extends Table
{

    protected $target = 'blogs';


    protected function columns(): iterable
    {
        return [
            TD::make('id', 'Imagen')
                ->width('150')
                ->render(function (Blog $blog) {
                    $image = $blog->attachment()->first();

                    return '<img src="'.($image ? $image->url() : '').'" alt="No existe " class="img-thumbnail rounded-circle" style="width: 90px; height: 90px;">';
                }),
            TD::make('title', 'Titulo')
                ->sort()
                ->filter()
                ->render(function (Blog $blog) {
                    return Link::make($blog->title)
                        ->route('platform.blog.edit', $blog);
                }),
            TD::make('level', 'Nivel')
                ->sort()
                ->filter(Input::make()->name('Filtrar'))
                ->render(fn (Blog $blog) => match ($blog->status) {
                    'draft' => '<span class="badge text-bg-danger">Borrado</span>',
                    'published' => '<span class="badge text-bg-success">Publicado</span>',
                    default => "<span class='text-success badge'>$blog->status</span>",
                }),
            TD::make('description', 'DESCRIPCIÓN')
                ->sort()
                ->filter(Input::make())
                ->render(function (Blog $blog) {
                    return Link::make(Str::limit($blog->content, 50))
                        ->route('platform.blog.edit', $blog);
                }),
            TD::make('Acciones')
                ->align(TD::ALIGN_CENTER)
                ->render(fn(Blog $event) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Editar'))
                            ->route('platform.blog.edit', $event)
                            ->icon('pencil'),
                        Button::make(__('Eliminar'))
                            ->icon('trash')
                            ->confirm(__('Advertencia.! Esta acción es irreversible. ¿Estás seguro de que deseas continuar?'))
                            ->method('remove', [
                                'id' => $event->id,
                            ]),
                    ])
                )

        ];
    }
}
