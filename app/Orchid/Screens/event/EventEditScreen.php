<?php

namespace App\Orchid\Screens\event;

use App\Models\Event;
use App\Models\Exhibitor;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use RealRashid\SweetAlert\Facades\Alert;

class EventEditScreen extends Screen
{
    public $event;
    public function query(Event $event): iterable
    {
        return ['event' => $event];
    }

    public function name(): ?string
    {
        return $this->event->exists ? 'Editar event blog ' : 'Crear nuevo evento';
    }

    public function commandBar(): iterable
    {
        return [
            Button::make('Crear nuevo')
                ->icon('database-add')
                ->method('createOrUpdate')
                ->class('btn btn-dark')
                ->canSee(! $this->event->exists),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->event->exists),
        ];
    }
    public function layout(): iterable
    {
        return [
           Layout::rows([
               Input::make('event.nombre')
                   ->title('Titulo del evento ')
                   ->placeholder('Ingresar el titulo del evento')
                   ->help('especifica el titulo del evento.')
                   ->required(),
               Input::make('event.documents_url')
                   ->title('Memorias')
                   ->placeholder('URL de memorias')
                   ->help('Ingresar la URl de las memorias del evento')
                   ->required(),
               Relation::make('event.exhibitor_id')
                   ->fromModel(Exhibitor::class, 'name')
                   ->title('Seleccione el anfitrión'),
               Relation::make('event.visitantes')
                   ->fromModel(Visitor::class, 'first_name')
                   ->multiple()
                   ->searchColumns('first_name')
                   ->title('Seleccione los visitantes')
           ])
        ];
    }
    public function createOrUpdate(Request $request, Event $event)
    {
        $request->merge(['post' => $request->get('event')]);

        $request->validate([
            'event.nombre' => 'required',
            'event.exhibitor_id' => 'required',
        ]);

        $values  = $request->get('event');
        $visitantes = $values['visitantes'];
        unset($values['visitantes']);

        $event->fill($values)->save();
        $event->visitantes()->sync($visitantes, []);



        Alert::info('Has creado exitosamente un evento');
        return redirect()->route('platform.events');
    }


}
