<?php

namespace App\Orchid\Layouts\visitors;

use App\Models\Visitor;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Switcher;


class VisitorsLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'visitors';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $visitor = new Visitor();

        return [
            TD::make('id', 'id')
                ->sort()
                ->filter()
                ->render(function ($visitor) {
                    return Link::make($visitor->id)
                        ->route('platform.visitor.edit', $visitor);
                }),

            TD::make('first_name', 'Nombre')
                ->sort()
                ->filter()
                ->render(function ($visitor) {
                    return Link::make($visitor->first_name)
                        ->route('platform.visitor.edit', $visitor);
                }),
            TD::make('first_last_name', 'Apellidos')
                ->sort()
                ->filter()
                ->render(function ($visitor) {
                    return Link::make($visitor->first_last_name)
                        ->route('platform.visitor.edit', $visitor);
                }),
            TD::make('Email', 'Email')
                ->sort()
                ->filter()
                ->render(function ($visitor) {
                    return Link::make($visitor->email)
                        ->icon('envelope')
                        ->route('platform.visitor.edit', $visitor);
                }),
            TD::make('Genero', 'Genero')
                ->sort()
                ->filter()
                ->render(function ($visitor) {
                    return Link::make($visitor->gender)
                        ->route('platform.visitor.edit', $visitor);
                }),
            TD::make('Telefono', 'Telefono')
                ->sort()
                ->filter()
                ->render(function ($visitor) {
                    return Link::make($visitor->phone)
                        ->icon('phone')
                        ->route('platform.visitor.edit', $visitor);
                }),
            TD::make('Nacionalidad', 'Nacionalidad')
                ->sort()
                ->filter()
                ->render(function ($visitor) {
                    return Link::make($visitor->nationality)
                        ->route('platform.visitor.edit', $visitor);
                }),
            TD::make('activo', 'ESTADO')
                ->render(function ($visitor) {
                    $status = $visitor->on_event ? 'ON' : 'OFF';
                    $icon = $visitor->on_event ? 'toggle-on' : 'toggle-off';
                    $color = $visitor->on_event ? 'btn btn-primary' : 'btn btn-danger';

                    return Button::make(__('Cambiar estado'))
                        ->class($color)
                        ->icon($icon)
                        ->confirm(__('Advertencia: esta acción permite que el usuario tenga mas permisos sobre el evento principal. '))
                        ->method('updateOnEvent', ['id' => $visitor->id]);
                }),

        ];
    }
}
