<?php

namespace App\Orchid\Layouts\Popus;

use App\Models\Popups;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PopupsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'popups';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'Imgen')
                ->render(function (Popups $popup) {
                    $image = $popup->attachment()->first();

                    return '<img src="'.($image ? $image->url() : '').'" alt="imagen no encontrada" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;">';

                }),
            TD::make('title', 'Titulo')
                ->sort()
                ->filter(Input::make())
                ->render(function (Popups $popups) {
                    return Link::make($popups->title)
                        ->route('platform.popup.edit', $popups);
                }),
            TD::make('content', 'Contenido')
                ->sort()
                ->filter(Input::make())
                ->render(function (Popups $popups) {
                    return Link::make($popups->content)
                        ->route('platform.popup.edit', $popups);
                }),
            TD::make('active', 'Estado')
                ->sort()
                ->filter(Input::make())
                ->render(function (Popups $popups) {
                    $estado = $popups->active == 1 ? 'Activo' : 'Inactivo';
                    $clase = $popups->active == 1 ? 'bg-success' : 'bg-danger';

                    return "<span class='badge badge-pill $clase'>$estado</span>";
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Popups $popups) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.popup.edit', $popups)
                            ->icon('pencil'),
                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Advertencia.! Esta acción es irreversible. ¿Estás seguro de que deseas continuar?'))
                            ->method('remove', [
                                'id' => $popups->id,
                            ]),
                    ])),
        ];
    }
}
