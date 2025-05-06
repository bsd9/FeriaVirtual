<?php

namespace App\Orchid\Screens\blog;

use App\Models\Blog;
use App\Orchid\Layouts\blog\BlogListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class BlogListScreen extends Screen
{

    public function query(): iterable
    {
        return [
            'blogs' => Blog::filters()->defaultSort('id')->paginate(5),
        ];
    }


    public function name(): ?string
    {
        return 'Listado de Noticias';
    }


    public function commandBar(): iterable
    {
        return [
            Link::make('Nuevo Blog')
                ->icon('pen')
                ->route('platform.blogs.create'),
        ];
    }


    public function layout(): iterable
    {
        return [
            BlogListLayout::class,
        ];
    }
    public function remove( Request $request)
    {
        Blog::find($request->get('id'))->delete();
        Toast::info(__('Evento eliminado'));

    }
}
