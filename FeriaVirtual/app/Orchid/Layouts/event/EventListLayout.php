<?php

namespace App\Orchid\Layouts\event;

use App\Models\Event;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class EventListLayout extends Table
{

    protected $target = 'events';

    protected function columns(): iterable
    {
        return [
            TD::make('id', 'id')->render(function (Event $event) {
                return Link::make($event->id)->route('platform.event.edit', $event);
            }),
            TD::make('Evento')->render(function (Event $event) {
                return Link::make($event->nombre)->route('platform.event.edit', $event);
            }),
            TD::make('Expositor')->render(function (Event $event) {
                return Link::make($event->exhibitor->name)->route('platform.event.edit', $event);
            }),
            TD::make('Memorias')->render(function (Event $event) {
                return Link::make($event->documents_url)->route('platform.event.edit', $event);
            }),
            TD::make('Acciones')
                ->align(TD::ALIGN_CENTER)
                ->render(fn(Event $event) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Editar'))
                            ->route('platform.event.edit', $event)
                            ->icon('pencil'),
                        Button::make(__('Eliminar'))
                            ->icon('trash')
                            ->confirm(__('Advertencia.! Esta acción es irreversible. ¿Estás seguro de que deseas continuar?'))
                            ->method('remove', [
                                'id' => $event->id,
                            ]),
                    ])
            )

        ];
    }
}
