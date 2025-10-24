<?php

namespace App\Orchid\Layouts\ferias;

use App\Models\Feria;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FeriasListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'ferias';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', '#')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->id)
                        ->route('platform.ferias', $feria);
                }),
            TD::make('Images')
                ->width('200')
                ->render(function (Feria $feria) {
                    $images = $feria->attachment;
                    $html = '';

                    foreach ($images as $image) {
                        $html .= '<img src="'.$image->url().'" alt="imagen" class="img-thumbnail rounded-circle" style="width: 50px; height: 50px;">';
                    }

                    return $html;
                }),

            TD::make('name', 'Nombre')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->name)
                        ->route('platform.feria.edit', $feria);
                }),

            TD::make('category_id', 'Category')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->category->name)
                        ->icon('union')
                        ->route('platform.category.show', $feria);
                }),

            TD::make('representative', 'Representante')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->representative)
                        ->route('platform.feria.edit', $feria);
                }),

            TD::make('city', 'City')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by city'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->city)
                        ->route('platform.feria.edit', $feria);
                }),
            TD::make('startDate', 'End')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by end'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->endDate)
                        ->route('platform.feria.edit', $feria);
                }),
            TD::make('endDate', 'End')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by end'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->endDate)
                        ->route('platform.feria.edit', $feria);
                }),

            TD::make('address', 'Address')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->representative)
                        ->route('platform.feria.edit', $feria);
                }),
            TD::make('facebook', 'Facebook')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->facebook)
                        ->icon('facebook')
                        ->route('platform.stand.edit', $feria);
                }),
            TD::make('whatsapp', 'Whatsapp')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->whatsapp)
                        ->icon('whatsapp')
                        ->route('platform.stand.edit', $feria);
                }),
            TD::make('instagram', 'Intagram')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Feria $feria) {
                    return Link::make($feria->instagram)
                        ->icon('instagram')
                        ->route('platform.stand.edit', $feria);
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Feria $feria) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.feria.edit', $feria)
                            ->icon('pencil'),
                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $feria->id,
                            ]),
                    ])),

        ];
    }
}
