<?php

namespace App\Orchid\Screens\facade;

use App\Models\FacadeScreenFront;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class HomeEditScreen extends Screen
{

    public $principal;

    public function query(FacadeScreenFront $principal): iterable
    {
        if (! $principal->exists) {
            $principal = new FacadeScreenFront();
        }

        $this->principal = $principal;

        return [
            'principal' => $principal,
            'facade_screen_fronts' => [
                'position' => $principal->position,
                'publicidad1' => $principal->getFirstMediaUrl('publicidad1'),
                'publicidad2' => $principal->getFirstMediaUrl('publicidad2'),
                'publicidad3' => $principal->getFirstMediaUrl('publicidad3'),
                'publicidad4' => $principal->getFirstMediaUrl('publicidad4'),
            ],
        ];
    }

    public function name(): ?string
    {
        return $this->principal->exists ? 'Editar Información' : 'Crear nueva publicidad';
    }

    public function commandBar(): iterable
    {
        return [
            Button::make('Crear nuevo')
                ->icon('database-add')
                ->method('createOrUpdate')
                ->class('btn btn-dark')
                ->canSee(! $this->principal->exists),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->principal->exists),

            Button::make('Eliminar')
                ->icon('trash')
                ->method('remove')
                ->class('btn btn-danger')
                ->canSee($this->principal->exists),
        ];
    }

    public function layout(): iterable
    {
        return [
            // ✅ 1. Campos normales en Layout::rows
            Layout::rows([
                Input::make('principal.nombre')
                    ->title('Nombre')
                    ->placeholder('Ingresa el nombre de la feria')
                    ->help('Especifica un título descriptivo corto para esta feria.')
                    ->required()
                    ->value($this->principal->nombre ?? ''),

                Select::make('facade_screen_fronts.position')
                ->options([
                    'principal' => 'Principal',
                    'right' => 'Segunda',
                    'left' => 'Tercera',
                ])
                ->empty('Seleccione una posición.')
                ->title('Posición')
                ->help('Seleccione una posición')
                ->value($this->principal->position ?? '')
            ]),

            // ✅ 2. Vista dinámica en su propio layout (nivel raíz)
            Layout::view('layouts.dynamic-ads'),
        ];
    }

    public function createOrUpdate(Request $request, FacadeScreenFront $principal)
    {
        $position = $request->input('facade_screen_fronts.position');

        $rules = [
            'principal.nombre' => 'required|string|max:255',
            'principal.publicidad1' => 'required|file|image|max:2048',
        ];

        if ($position === 'right' || $position === 'left') {
            $rules['facade_screen_fronts.publicidad2'] = 'required|file|image|max:2048';
        }

        if ($position === 'left') {
            $rules['facade_screen_fronts.publicidad3'] = 'required|file|image|max:2048';
            $rules['facade_screen_fronts.publicidad4'] = 'required|file|image|max:2048';
        }

        $request->validate($rules);

        $principal->nombre = $request->input('principal.nombre');
        $principal->position = $position;
        $principal->save();

        $this->clearAllMediaCollections($principal);
        $this->addImagesToCollections($principal, $request);

        Toast::info('Cambios guardados exitosamente.');
        return redirect()->route('platform.principals');
    }

    protected function clearAllMediaCollections(FacadeScreenFront $principal)
    {
        $collections = ['publicidad1', 'publicidad2', 'publicidad3', 'publicidad4'];
        foreach ($collections as $collection) {
            $principal->clearMediaCollection($collection);
        }
    }

    protected function addImagesToCollections(FacadeScreenFront $principal, Request $request)
    {
        if ($request->hasFile('principal.publicidad1')) {
            $principal->addMedia($request->file('principal.publicidad1'))->toMediaCollection('publicidad1');
        }

        if ($request->hasFile('facade_screen_fronts.publicidad2')) {
            $principal->addMedia($request->file('facade_screen_fronts.publicidad2'))->toMediaCollection('publicidad2');
        }

        if ($request->hasFile('facade_screen_fronts.publicidad3')) {
            $principal->addMedia($request->file('facade_screen_fronts.publicidad3'))->toMediaCollection('publicidad3');
        }

        if ($request->hasFile('facade_screen_fronts.publicidad4')) {
            $principal->addMedia($request->file('facade_screen_fronts.publicidad4'))->toMediaCollection('publicidad4');
        }
    }

    public function remove()
    {
        $this->principal->delete();
        Toast::success('Feria eliminada correctamente.');
        return redirect()->route('platform.principals');
    }
}