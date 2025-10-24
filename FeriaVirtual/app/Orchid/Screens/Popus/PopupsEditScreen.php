<?php

namespace App\Orchid\Screens\Popus;

use App\Models\Popups;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PopupsEditScreen extends Screen
{
    public $popup;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Popups $popup): iterable
    {
        return [
            'popup' => $popup,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->popup->exists ? 'Editar la informacion del POPUPS ' : 'Crear nueva informacion.';
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
                ->canSee(! $this->popup->exists),
            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->popup->exists),

            Button::make('Eliminar')
                ->class('btn btn-danger')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->popup->exists),
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
            Layout::tabs([
                'Información' => [
                    Layout::rows([
                        Input::make('popup.title')
                            ->title('Titulo')
                            ->placeholder('Ingresa el titulo de la ventana modal.')
                            ->required(),
                        TextArea::make('popup.content')
                            ->title('Contenido')
                            ->placeholder('Ingresa una descripcion de la ventana modal.')
                            ->required(),
                        Select::make('popup.active')
                            ->title('Estado')
                            ->required()
                            ->options([
                                1 => 'Activo',
                                0 => 'Inactivo',
                            ])
                            ->empty('Seleccione un estado.'),
                    ]),
                ],

                'Multimedia' => [
                    Layout::rows([
                        Upload::make($this->popup->exists ? 'popup.image' : 'upload')
                            ->title('Imagen')
                            ->storage('configurations'),
                    ]),

                ],

            ]),

        ];
    }

    public function createOrUpdate(Request $request, Popups $popup)
    {
        $request->validate([
            'popup.title' => 'required',
            'popup.content' => 'required',
            'popup.active' => 'required',
        ]);

        $popupInput = $popup->exists ? 'popup.image' : 'upload';

        $popup->fill($request->get('popup'));

        if (isset($request->input($popupInput)[0])) {
            $popup->image = $request->input($popupInput)[0];
        }
        $popup->save();

        $popup->attachment()->syncWithoutDetaching(
            $request->input($popupInput, [])
        );

        Alert::info('Has creado una ventana modal global.');

        return redirect()->route('platform.popups');
    }

    protected function clearImageCollection(Popups $popup)
    {
        $popup->clearMediaCollection('popups');
    }

    protected function addImageToCollection(Popups $popup, Request $request)
    {
        if ($request->hasFile('img')) {
            $popup->addMedia($request->file('img'))->toMediaCollection('popups');
        }
        if ($request->hasFile('popup.img')) {
            $popup->addMediaFromRequest('popup.img')->toMediaCollection('popups');
        }
    }

    public function remove()
    {
        $this->popup->delete();
        Alert::error('Has eliminado un aventana emergente exitosamente.');

        return redirect()->route('platform.popups');
    }
}
