<?php

namespace App\Orchid\Layouts\attendees;

use App\Models\Attendee;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AttendeesListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'attendees';

    /**
     * Get the table cells to be displayed.
     *
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'Logo')
                ->width('200')
                ->render(function (Attendee $attendee) {
                    return "<img src=\"{$attendee->getFirstMediaUrl('avatarsAttendees')}\" alt=\"imagen no encontrada\" class=\"img-thumbnail rounded-circle mr-2\" style=\"width: 90px; height: 90px;\">";
                }),

            TD::make('nombre', 'Name ')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Attendee $attendee) {
                    return Link::make($attendee->nombre)
                        ->route('platform.attendee.edit', $attendee);
                }),

            TD::make('correoElectronico', 'Correo electrónico')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Attendee $attendee) {
                    return Link::make($attendee->correoElectronico)
                        ->icon('envelope-at-fill')
                        ->route('platform.attendee.edit', $attendee);
                }),

            TD::make('empresa', 'Corporation')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Attendee $attendee) {
                    return Link::make($attendee->empresa)
                        ->route('platform.attendee.edit', $attendee);
                }),

            TD::make('intereses', 'Intereses')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Attendee $attendee) {
                    $interests = $attendee->interests()->pluck('name')->implode(', ');

                    $interestsHtml = '<span class="interest-name">'.$interests.'</span>';

                    return $interestsHtml;
                }),

            TD::make('numeroCelular', 'Movil')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by start'))
                ->render(function (Attendee $feria) {
                    return Link::make($feria->numeroCelular)
                        ->icon('phone')
                        ->route('platform.attendee.edit', $feria);
                }),
            TD::make('feria_id', 'Feria')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by end'))
                ->render(function (Attendee $attendee) {
                    return Link::make($attendee->feria->name)
                        ->icon('union')
                        ->route('platform.attendee.edit', $attendee);
                }),

            TD::make('stand_id', 'stand')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Attendee $attendee) {
                    return Link::make($attendee->stand->name)
                        ->icon('union')
                        ->route('platform.attendee.edit', $attendee);
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Attendee $attendee) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.attendee.edit', $attendee)
                            ->icon('pencil'),
                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Advertencia.! Esta acción es irreversible. ¿Estás seguro de que deseas continuar?'))
                            ->method('remove', [
                                'id' => $attendee->id,
                            ]),
                    ])),

        ];
    }
}
