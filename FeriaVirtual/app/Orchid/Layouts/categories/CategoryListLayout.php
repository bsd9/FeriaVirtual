<?php

namespace App\Orchid\Layouts\categories;

use App\Models\Category;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'categories';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'CODIGO')
                ->sort()
                ->render(function (Category $category) {
                    return Link::make($category->id)
                        ->route('platform.category.edit', $category);
                }),

            TD::make('name', 'NOMBRE')
                ->sort()
                ->filter(Input::make()->name('Filter by id'))
                ->render(function (Category $category) {
                    return Link::make($category->name)
                        ->route('platform.category.edit', $category);
                }),
            TD::make('description', 'DESCRIPCIÓN')
                ->sort()
                ->filter(Input::make())
                ->render(function (Category $category) {
                    return Link::make(Str::limit($category->description, 50))
                        ->route('platform.category.edit', $category);
                }),
            TD::make(__('ACCIONES'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Category $category) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.stand.edit', $category)
                            ->icon('pencil'),
                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Esta acción no tiene reversa, y se perderán los datos del sistema, desea continuar.'))
                            ->method('remove', [
                                'id' => $category->id,
                            ]),
                        Link::make(__('Show'))
                            ->route('platform.category.edit', $category)
                            ->icon('eye'),
                    ])),
        ];
    }
}
