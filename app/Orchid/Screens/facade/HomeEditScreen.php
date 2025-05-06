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
                    Input::make('facade_screen_fronts.nombre')
                        ->title('Nombre')
                        ->placeholder('Ingresa el nombre de la feria')
                        ->help('Especifica un título descriptivo corto para esta feria.')
                        ->required(),
                    Group::make([
                        Input::make('facade_screen_fronts.publicidad1')
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
                    ]),
                    Group::make([
                        Input::make('facade_screen_fronts.publicidad4')
                            ->title('Cuarta imagen')
                            ->type('file')
                            ->help('Sube una imagen para la publicidad #4'),
                        Input::make('facade_screen_fronts.publicidad5')
                            ->title('Quita imagen')
                            ->type('file')
                            ->help('Sube una imagen para la publicidad #5'),
                    ]),
                    Select::make('facade_screen_fronts.position')
                        ->options([
                            'principal' => 'Principal',
                            'right' => 'derecha',
                            'back' => 'Tracera',
                            'left' => 'Izquierda',
                        ])
                        ->empty('Seleccione una.')
                        ->title('Select tags')
                        ->help('Seleccione una posicion'),

                ]),
                Layout::rows([
                    Input::make('facade_screen_fronts.banner1')
                        ->title('Banenr #1')
                        ->placeholder('Ingresa el nombre de la feria')
                        ->help('Imagen del banner numero 1')
                        ->type('file')
                        ->required(),

                    Input::make('facade_screen_fronts.banner2')
                        ->title('Banenr #2')
                        ->placeholder('Ingresa el nombre de la feria')
                        ->help('Imagen del banner numero 2')
                        ->type('file')
                        ->required(),
                    Input::make('facade_screen_fronts.banner3')
                        ->title('Banenr #3')
                        ->placeholder('Ingresa el nombre de la feria')
                        ->help('Imagen del banner numero 3')
                        ->type('file')
                        ->required(),
                    Input::make('facade_screen_fronts.banner4')
                        ->title('Banenr #4')
                        ->placeholder('Ingresa el nombre de la feria')
                        ->help('Imagen del banner numero 4')
                        ->type('file')
                        ->required(),
                ]),
            ]),

        ];
    }

    public function createOrUpdate(Request $request, FacadeScreenFront $principal)
    {
        $request->validate([
            'facade_screen_fronts.publicidad1' => 'required',
            'facade_screen_fronts.publicidad2' => 'required',
            'facade_screen_fronts.publicidad3' => 'required',
            'facade_screen_fronts.publicidad4' => 'required',
            'facade_screen_fronts.publicidad5' => 'required',
            'facade_screen_fronts.nombre' => 'required',
            'facade_screen_fronts.banner1' => 'required',
            'facade_screen_fronts.banner2' => 'required',
            'facade_screen_fronts.banner3' => 'required',
            'facade_screen_fronts.banner4' => 'required',

        ]);
        $this->clearAllMediaCollections($principal);
        $this->addImagesToCollections($principal, $request);
        $principal->fill($request->get('facade_screen_fronts'))->save();

        Toast::info(__('Change made successfully.'));
        Alert::info('You have successfully created or updated the feria.');

        return redirect()->route('platform.principals');
    }

    protected function clearAllMediaCollections(FacadeScreenFront $principal)
    {
        $collections = ['publicidad1', 'publicidad2', 'publicidad3', 'publicidad4', 'publicidad5', 'banner1', 'banner2', 'banner3', 'banner4'];
        foreach ($collections as $collection) {
            $principal->clearMediaCollection($collection);
        }
    }

    protected function addImagesToCollections(FacadeScreenFront $principal, Request $request)
    {
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
        if ($request->hasFile('facade_screen_fronts.publicidad5')) {
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
        }
    }

    public function remove()
    {
        $this->principal->delete();
        Alert::success('Éxito. Has eliminado la compañía con éxito.');

        return redirect()->route('platform.pricipals');
    }
}
