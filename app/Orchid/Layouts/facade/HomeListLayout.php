<?php

namespace App\Orchid\Layouts\facade;

use App\Models\FacadeScreenFront;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class HomeListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'principals';

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
                ->render(function (FacadeScreenFront $data) {
                    return Link::make($data->id)
                        ->route('platform.principal.edit', $data);
                }),
            TD::make('id', 'Publicidad')
                ->width('400')
                ->render(function (FacadeScreenFront $data) {
                    return "<img src=\"{$data->getFirstMediaUrl('publicidad1')}\" alt=\"publicidad1\" class=\"img-thumbnail rounded-circle mr-2\" style=\"width: 70px; height: 70px;\">
                        <img src=\"{$data->getFirstMediaUrl('publicidad2')}\" alt=\"publicidad2\" class=\"img-thumbnail rounded-circle mr-2\" style=\"width: 70px; height: 70px;\">
                        <img src=\"{$data->getFirstMediaUrl('publicidad3')}\" alt=\"publicidad3\" class=\"img-thumbnail rounded-circle mr-2\" style=\"width: 70px; height: 70px;\">
                        <img src=\"{$data->getFirstMediaUrl('publicidad4')}\" alt=\"publicidad4\" class=\"img-thumbnail rounded-circle mr-2\" style=\"width: 70px; height: 70px;\">
                        <img src=\"{$data->getFirstMediaUrl('publicidad5')}\" alt=\"publicidad5\" class=\"img-thumbnail rounded-circle mr-2\" style=\"width: 70px; height: 70px;\">

                ";
                }),
            TD::make('id', 'Banners')
                ->width('400')
                ->render(function (FacadeScreenFront $data) {
                    return "
                        <img src=\"{$data->getFirstMediaUrl('banner1')}\" alt=\"banner 1\" class=\"img-thumbnail rounded-circle mr-2\" style=\"width: 70px; height: 70px;\">
                        <img src=\"{$data->getFirstMediaUrl('banner2')}\" alt=\"banner 2\" class=\"img-thumbnail rounded-circle mr-2\" style=\"width: 70px; height: 70px;\">
                        <img src=\"{$data->getFirstMediaUrl('banner3')}\" alt=\"banner 3\" class=\"img-thumbnail rounded-circle mr-2\" style=\"width: 70px; height: 70px;\">
                        <img src=\"{$data->getFirstMediaUrl('banner4')}\" alt=\"banner 4\" class=\"img-thumbnail rounded-circle mr-2\" style=\"width: 70px; height: 70px;\">
                ";
                }),
            TD::make('name', 'Nombre')
                ->sort()
                ->render(function (FacadeScreenFront $data) {
                    return Link::make($data->nombre)
                        ->route('platform.principal.edit', $data);
                }),
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (FacadeScreenFront $data) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Editar'))
                            ->route('platform.principal.edit', $data)
                            ->icon('pencil'),
                        Button::make(__('Eliminar'))
                            ->icon('trash')
                            ->confirm(__('Esta acción no se puede revertir'))
                            ->method('remove', [
                                'id' => $data->id,
                            ]),
                    ])),

        ];
    }
}
