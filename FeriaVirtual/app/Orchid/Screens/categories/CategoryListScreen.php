<?php

namespace App\Orchid\Screens\categories;

use App\Models\Category;
use App\Orchid\Layouts\categories\CategoryListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class CategoryListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'categories' => Category::filters()
                ->defaultSort('id')
                ->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Listas de Categorias';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Categorias en el Sistema ';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Nuevo')
                ->icon('pen')
                ->route('platform.category.create'),
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
            CategoryListLayout::class,
        ];
    }

    public function remove($id)
    {
        $category = Category::findOrFail($id);
        $validar = Category::findOrFail($id)->ferias->count();
        if ($validar > 0) {
            Alert::error('La categoría tiene una relación con ferias, es imposible llevar a cabo esta acción.');
        } else {
            $category->delete($id);
            Alert::success('Se elimino un acategoria correctamente.');
        }

        return redirect()->route('platform.categories');
    }
}
