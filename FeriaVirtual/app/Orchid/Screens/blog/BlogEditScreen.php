<?php

namespace App\Orchid\Screens\blog;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert as FacadesAlert;
use Orchid\Support\Facades\Layout;

class BlogEditScreen extends Screen
{
    public $blog;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Blog $blog): iterable
    {
        return ['blog' => $blog];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->blog->exists ? 'Editar blog ' : 'Crear Blog';
    }


    public function commandBar(): iterable
    {
        return [
            Button::make('Crear nuevo')
                ->icon('database-add')
                ->method('createOrUpdate')
                ->class('btn btn-dark')
                ->canSee(! $this->blog->exists),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->blog->exists),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([

                Group::make([
                    Upload::make($this->blog->exists ? 'blog.featured_image' : 'upload')
                        ->title('Imagen del Blog')
                        ->acceptedFiles('image/*')
                        ->storage('blogs'),
                ]),
                Input::make('blog.title')
                    ->title('Titulo del blog ')
                    ->placeholder('Ingresar el titulo del blog')
                    ->help('especifica el titulo de la noticia.')
                    ->required(),
                Select::make('blog.status')
                    ->options([
                        'draft' => 'Borrador',
                        'published' => 'Publicado',
                    ]),

                Quill::make('blog.content')
                    ->title('Contenido del blog')
                    ->required()
                    ->toolbar(['text', 'color', 'header', 'list', 'format', 'media'])
                    ->saveAsHtml(),

            ]),
        ];
    }

    public function createOrUpdate(Request $request, Blog $blog)
    {
        $request->validate([
            'blog.title' => 'required',
            'blog.status' => 'required',
            'blog.content' => 'required',
        ]);
        $input = $blog->exists ? 'blog.featured_image' : 'upload';

        $blog->fill($request->get('blog'));
        if (isset($request->input($input)[0])) {
            $blog->featured_image = $request->input($input)[0];
        }

        $blog->slug = Str::slug($request->blog['title'], '-');

        $blog->save();

        $blog->attachment()->syncWithoutDetaching(
            $request->input($input, [])
        );

        FacadesAlert::info('Has creado exitosamente un blog');

        return redirect()->route('platform.blogs');
    }
}
