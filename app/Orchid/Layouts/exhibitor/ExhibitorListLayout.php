<?php

namespace App\Orchid\Layouts\exhibitor;

use App\Models\Exhibitor;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ExhibitorListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'exhibitors';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'Logo')
                ->width('150')
                ->render(function (Exhibitor $configuration) {
                    $image = $configuration->attachment()->first();

                    return '<img src="'.($image ? $image->url() : '').'" alt="imagen no encontrada" class="img-thumbnail rounded-circle" style="width: 90px; height: 90px;">';

                }),

            TD::make('name', 'Nombre')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Exhibitor $exhibitor) {
                    return Link::make($exhibitor->name)
                        ->route('platform.exhibitor.edit', $exhibitor);
                }),

            TD::make('description', 'Description')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(fn (Exhibitor $exhibitor) => ModalToggle::make(Str::limit($exhibitor->description, 50))
                    ->modal('showDescription')
                    ->modalTitle($exhibitor->name)
                    ->asyncParameters([
                        'exhibitor' => $exhibitor->id,
                    ])),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Exhibitor $exhibitor) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.exhibitor.edit', $exhibitor)
                            ->icon('pencil'),
                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $exhibitor->id,
                            ]),
                        Link::make(__('Show'))
                            ->route('platform.exhibitor.edit', $exhibitor)
                            ->icon('eye'),
                    ])),

        ];
    }
}
