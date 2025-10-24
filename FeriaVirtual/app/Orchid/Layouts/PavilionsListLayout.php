<?php

namespace App\Orchid\Layouts;

use App\Models\Pavilion;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Alert;

class PavilionsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'pavilions';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->sort(),

            TD::make('name', 'Nombre')
                ->sort()
                ->filter(Input::make()->placeholder('Filtrar por nombre'))
                ->render(function (Pavilion $pavilion) {
                    return Link::make($pavilion->name)
                        ->route('platform.pavilions.edit', $pavilion);
                }),

            TD::make('created_at', 'Creado')
                ->sort()
                ->render(fn (Pavilion $p) => $p->created_at->format('d/m/Y')),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Pavilion $pavilion) => DropDown::make()
                    ->icon('grid-fill') // ← Ícono idéntico a Stands
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.pavilions.edit', $pavilion)
                            ->icon('pencil'),
                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('¿Estás seguro de eliminar este pabellón? Esta acción no se puede deshacer.'))
                            ->method('remove', [
                                'id' => $pavilion->id,
                            ]),
                        Link::make(__('Show'))
                            ->route('platform.pavilions.edit', $pavilion)
                            ->icon('eye'),
                    ])),

        ];
    }

    public function remove(Pavilion $pavilion)
    {
        $pavilion->delete();
        Alert::info('Pabellón eliminado correctamente.');

        return redirect()->route('platform.pavilions');
    }
}