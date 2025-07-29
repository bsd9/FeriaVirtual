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

            TD::make('publicidad', 'Publicidad')
                ->width('400px')
                ->render(function (FacadeScreenFront $data) {
                    $images = [];

                    // Mostrar imágenes según la posición
                    if ($data->position === 'principal' || $data->position === 'right' || $data->position === 'left') {
                        $images[] = $data->getFirstMediaUrl('publicidad1');
                    }

                    if ($data->position === 'right' || $data->position === 'left') {
                        $images[] = $data->getFirstMediaUrl('publicidad2');
                    }

                    if ($data->position === 'left') {
                        $images[] = $data->getFirstMediaUrl('publicidad3');
                        $images[] = $data->getFirstMediaUrl('publicidad4');
                    }

                    // Filtrar URLs vacías
                    $images = array_filter($images);

                    if (empty($images)) {
                        return '<span class="text-muted">Sin imágenes</span>';
                    }

                    $html = '';
                    foreach ($images as $img) {
                        $html .= "<img src=\"{$img}\" alt=\"publicidad\" class=\"img-thumbnail\" style=\"width: 70px; height: 70px; object-fit: cover; margin-right: 6px; border-radius: 8px;\">";
                    }

                    return $html;
                }),

            TD::make('nombre', 'Nombre')
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