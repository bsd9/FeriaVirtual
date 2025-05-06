<?php

namespace App\Orchid\Screens\audience;

use App\Models\Audience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class AudienceEditScreen extends Screen
{
    public $audience;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Audience $audience): iterable
    {
        return [
            'audience' => $audience,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->audience->exists ? 'Editar la informacion del auditorio ' : 'Crear nueva auditorio.';
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
                ->canSee(! $this->audience->exists),
            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->audience->exists),

            Button::make('Eliminar')
                ->class('btn btn-danger')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->audience->exists),
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
            Layout::rows([
                Input::make('audience.name')
                    ->title('Nombre')
                    ->placeholder('Defina el nombre del auditorio')
                    ->required(),
                Group::make([
                    Upload::make($this->audience->exists ? 'audience.imagen_rigth' : 'upload1')
                        ->title('Imagen derecha del auditorio')
                        ->maxFiles(1)
                        ->acceptedTypes(['image/*'])
                        ->uniqueName()
                        ->storage('audience'),
                    Upload::make($this->audience->exists ? 'audience.image_left' : 'upload2')
                        ->title('Imagen izquierda del auditorio')
                        ->maxFiles(1)
                        ->acceptedTypes(['image/*'])
                        ->uniqueName()
                        ->storage('audience'),

                ]),
                Input::make('audience.video_url')
                    ->title('Evento Principal')
                    ->help('Ingrese el ingrese el vinculo del evento princiapl.')
                    ->required()
                    ->type('url'),
            ]),
        ];
    }

    /**
     * @return RedirectResponse
     */
    public function createOrUpdate(Request $request, Audience $audience)
    {
        $request->validate([
            'audience.name' => 'required',
        ]);

        $fieldName1 = $audience->exists ? 'audience.imagen_rigth' : 'upload1';
        $fieldName2 = $audience->exists ? 'audience.image_left' : 'upload2';

        $audience->fill($request->get('audience'));

        if (isset($request->input($fieldName1)[0])) {
            $audience->imagen_rigth = $request->input($fieldName1)[0];
        }

        if (isset($request->input($fieldName1)[0])) {
            $audience->image_left = $request->input($fieldName2)[0];
        }

        $audience->save();

        $audience->attachment()->syncWithoutDetaching(
            $request->input($fieldName1, [])
        );
        $audience->attachment()->syncWithoutDetaching(
            $request->input($fieldName2, [])
        );

        Alert::info('Has creado un nuevo auditorio.');

        return redirect()->route('platform.audiences');
    }

    public function remove()
    {
        $this->audience->delete();
        Alert::error('Has eliminado un auditorio exitosamente.');

        return redirect()->route('platform.audiences');
    }
}
