<?php

namespace App\Orchid\Screens\categories;

use App\Models\Category;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CategoryEditScreen extends Screen
{
    /**
     * @var Category
     */
    public $category;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Category $category): iterable
    {
        return [
            'category' => $category,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->category->exists ? 'Editar categoría' : 'Crear una nueva categoría';

    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Listado de Categorias.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Crear nuevo')
                ->icon('database-add')
                ->method('createOrUpdate')
                ->class('btn btn-dark')
                ->canSee(! $this->category->exists),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->category->exists),

            Button::make('Eliminar')
                ->icon('trash')
                ->method('delete')
                ->class('btn btn-danger')
                ->canSee($this->category->exists),
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
                Input::make('category.name')
                    ->title('Nombre')
                    ->placeholder('Ingresa el nombre de la categoría')
                    ->help('Especifica un nombre descriptivo y breve para esta categoría.')
                    ->required(),
                TextArea::make('category.description')
                    ->title('Descripción')
                    ->placeholder('Ingresa la descripción de la categoría')
                    ->help('Proporciona una descripción breve y descriptiva para esta categoría.')
                    ->required(),
            ]),
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->category->fill($request->get('category'))->save();
        Alert::info('Has creado una categoría exitosamente.');

        return redirect()->route('platform.categories');
    }

    public function delete(Category $category)
    {

        if (count($category->ferias) > 0) {
            Alert::error('La categoría tiene una relación con ferias, es imposible llevar a cabo esta acción.');
        } else {
            $category->delete();
            Alert::success('Has eliminado la categoría exitosamente.');
        }

        return redirect()->route('platform.categories');
    }
}
