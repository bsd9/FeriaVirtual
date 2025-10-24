<?php

namespace App\Orchid\Screens\facade;

use App\Models\FacadeScreenFront;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class HomeEditScreen extends Screen
{
    public $principal;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(FacadeScreenFront $principal): iterable
{
    if ($principal->exists) {
        return [
            'principal' => $principal,
            'facade_screen_fronts' => [
                'nombre' => $principal->exists ? $principal->nombre : '',
                'publicidad1' => $principal->exists ? $principal->getFirstMediaUrl('publicidad1') : '',
                'publicidad2' => $principal->exists ? $principal->getFirstMediaUrl('publicidad2') : '',
                'publicidad3' => $principal->exists ? $principal->getFirstMediaUrl('publicidad3') : '',
                'publicidad4' => $principal->exists ? $principal->getFirstMediaUrl('publicidad4') : '',
                'position' => $principal->exists ? $principal->position : '',
            ],
        ];
    }
    
    return [
        'principal' => $principal,
    ];
}

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->principal->exists ? 'Editar Informacion' : 'Crear nueva publicidad';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
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

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::columns([
                Layout::rows([
                    Input::make('principal.nombre')
                        ->title('Nombre')
                        ->placeholder('Ingresa el nombre de la feria')
                        ->help('Especifica un título descriptivo corto para esta feria.')
                        ->required()
                        ->value($this->principal->exists ? $this->principal->nombre : ''),

                    Select::make('facade_screen_fronts.position')
                    ->options([
                        'principal' => 'Principal',
                        'right'     => 'Derecha',
                        'left'      => 'Izquierda',
                    ])
                    ->empty('Seleccione una posición.')
                    ->title('Posición')
                    ->help('Seleccione una posición')
                    ->value($this->principal->exists ? $this->principal->position : ''),

                    Input::make('principal.publicidad1')
                        ->title('Primera imagen')
                        ->type('file')
                        ->help('Sube una imagen para la publicidad #1'),

                    Input::make('facade_screen_fronts.publicidad2')
                        ->title('Segunda imagen')
                        ->type('file')
                        ->help('Sube una imagen para la publicidad #2'),

                    Input::make('facade_screen_fronts.publicidad3')
                        ->title('Tercera imagen')
                        ->type('file')
                        ->help('Sube una imagen para la publicidad #3'),

                    Input::make('facade_screen_fronts.publicidad4')
                        ->title('Cuarta imagen')
                        ->type('file')
                        ->help('Sube una imagen para la publicidad #4'),
                ]),

                // Cargar el script
                Layout::view('partials.script'),
            ]),
        ];
    }

    public function createOrUpdate(Request $request, FacadeScreenFront $principal)
    {
        $position = $request->input('facade_screen_fronts.position');

        $rules = [
            'principal.nombre' => 'required',
            'principal.publicidad1' => 'required',
        ];

        if ($position === 'right' || $position === 'left') {
            $rules['facade_screen_fronts.publicidad2'] = 'required';
        }
        if ($position === 'right') {
            $rules['facade_screen_fronts.publicidad3'] = 'required';
            $rules['facade_screen_fronts.publicidad4'] = 'required';
        }

        $request->validate($rules);

        // Guardar posición
        $principal->position = $position;

        // Limpiar colecciones
        $this->clearAllMediaCollections($principal);

        // Guardar nombre
        $principal->fill([
            'nombre' => $request->input('principal.nombre'),
        ])->save();

        // Añadir imágenes
        $this->addImagesToCollections($principal, $request);

        Toast::info(__('Cambios realizados exitosamente.'));
        Alert::info('Has creado o actualizado la feria correctamente.');

        return redirect()->route('platform.principals');
    }

    protected function clearAllMediaCollections(FacadeScreenFront $principal)
    {
        $collections = ['publicidad1', 'publicidad2', 'publicidad3', 'publicidad4'/*, 'publicidad5', 'banner1', 'banner2', 'banner3', 'banner4'*/];
        foreach ($collections as $collection) {
            $principal->clearMediaCollection($collection);
        }
    }

    protected function addImagesToCollections(FacadeScreenFront $principal, Request $request)
    {
        $fields = [
            'publicidad1'
        ];
        
        foreach ($fields as $field) {
            if ($request->hasFile("principal.{$field}")) {
                $principal->addMedia($request->file("principal.{$field}"))
                        ->toMediaCollection($field);
            }
        }
        if ($request->hasFile('facade_screen_fronts.publicidad1')) {
            $principal->addMedia($request->file('facade_screen_fronts.publicidad1'))->toMediaCollection('publicidad1');
        }
        if ($request->hasFile('facade_screen_fronts.publicidad2')) {
            $principal->addMediaFromRequest('facade_screen_fronts.publicidad2')->toMediaCollection('publicidad2');
        }
        if ($request->hasFile('facade_screen_fronts.publicidad3')) {
            $principal->addMediaFromRequest('facade_screen_fronts.publicidad3')->toMediaCollection('publicidad3');
        }
        if ($request->hasFile('facade_screen_fronts.publicidad4')) {
            $principal->addMediaFromRequest('facade_screen_fronts.publicidad4')->toMediaCollection('publicidad4');
        }
        /*if ($request->hasFile('facade_screen_fronts.publicidad5')) {
            $principal->addMediaFromRequest('facade_screen_fronts.publicidad5')->toMediaCollection('publicidad5');
        }
        if ($request->hasFile('facade_screen_fronts.banner1')) {
            $principal->addMediaFromRequest('facade_screen_fronts.banner1')->toMediaCollection('banner1');
        }
        if ($request->hasFile('facade_screen_fronts.banner2')) {
            $principal->addMediaFromRequest('facade_screen_fronts.banner2')->toMediaCollection('banner2');
        }
        if ($request->hasFile('facade_screen_fronts.banner3')) {
            $principal->addMediaFromRequest('facade_screen_fronts.banner3')->toMediaCollection('banner3');
        }
        if ($request->hasFile('facade_screen_fronts.banner4')) {
            $principal->addMediaFromRequest('facade_screen_fronts.banner4')->toMediaCollection('banner4');
        }*/
    }

    public function remove()
    {
        $this->principal->delete();
        Alert::success('Éxito. Has eliminado la compañía con éxito.');

        return redirect()->route('platform.principals');
    }
}
