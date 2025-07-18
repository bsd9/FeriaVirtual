<?php

namespace App\Orchid\Screens\ferias;

use App\Models\Category;
use App\Models\Feria;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class FeriasEditScreen extends Screen
{
    public $feria;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Feria $feria): iterable
    {
        return [
            'feria' => $feria,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->feria->exists ? 'Edit feria' : 'Creating a new feria';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Blog edit feria';
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
                ->canSee(! $this->feria->exists),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->feria->exists),

            Button::make('Eliminar')
                ->icon('trash')
                ->method('remove')
                ->class('btn btn-danger')
                ->canSee($this->feria->exists),
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
                        Input::make('feria.name')
                            ->title('Nombre')
                            ->placeholder('Ingresa el nombre de la feria')
                            ->help('Especifica un título descriptivo corto para esta feria.')
                            ->required(),

                        Input::make('feria.representative')
                            ->title('Representante')
                            ->placeholder('Ingresa el nombre del representante')
                            ->help('Especifica el nombre del representante de esta feria.')
                            ->required(),

                        Relation::make('feria.category_id')
                            ->fromModel(Category::class, 'name')
                            ->title('Elige tu categoría')
                            ->placeholder('Ingresa la categoría de la feria')
                            ->help('Especifica la categoría de esta feria.')
                            ->required(),

                        Input::make('feria.city')
                            ->title('Ciudad')
                            ->placeholder('Ingresa la ciudad de la feria')
                            ->help('Especifica la ciudad de esta feria.')
                            ->required(),

                        Group::make([
                            DateTimer::make('feria.startDate')
                                ->title('Fecha de inicio')
                                ->required(),
                            DateTimer::make('feria.endDate')
                                ->title('Fecha de finalización')
                                ->required(),
                        ]),
                    ]),
                ],
                'Redes' => [
                    Layout::rows([
                        Input::make('feria.facebook')
                            ->title('Página de Facebook')
                            ->help('Ingresa la página de Facebook de la feria o la empresa.')
                            ->required()
                            ->type('url'),
                        Input::make('feria.whatsapp')
                            ->title('Asesor de WhatsApp')
                            ->help('Ingresa la página de WhatsApp de la feria o la empresa.')
                            ->required()
                            ->type('url'),
                        Input::make('feria.instagram')
                            ->title('Página de Instagram')
                            ->help('Ingresa la página de Instagram de la feria o la empresa.')
                            ->required()
                            ->type('url'),

                        TextArea::make('feria.address')
                            ->title('Dirección')
                            ->placeholder('Ingresa la dirección de la feria')
                            ->rows(6)
                            ->style('width: 100%')
                            ->help('Especifica la dirección de esta feria.')
                            ->required(),
                    ]),
                ],
                'Multimedia' => [
                    Layout::rows([
                        Group::make([
                            Upload::make($this->feria->exists ? 'feria.image1' : 'upload1')
                                ->title('Imagen delantera')
                                ->maxFiles(1)
                                ->acceptedTypes(['image/*'])
                                ->uniqueName()
                                ->storage('feriaImages'),

                            Upload::make($this->feria->exists ? 'feria.image2' : 'upload2')
                                ->title('Imagen derecha')
                                ->maxFiles(1)
                                ->acceptedTypes(['image/*'])
                                ->uniqueName()
                                ->storage('feriaImages'),

                            Upload::make($this->feria->exists ? 'feria.image3' : 'upload3')
                                ->title('Imagen trasera')
                                ->maxFiles(1)
                                ->acceptedTypes(['image/*'])
                                ->uniqueName()
                                ->storage('feriaImages'),

                            Upload::make($this->feria->exists ? 'feria.image4' : 'upload4')
                                ->title('Imagen izquierda')
                                ->maxFiles(1)
                                ->acceptedTypes(['image/*'])
                                ->uniqueName()
                                ->storage('feriaImages'),

                            Upload::make($this->feria->exists ? 'feria.image5' : 'upload5')
                                ->title('Imagen interior')
                                ->maxFiles(1)
                                ->acceptedTypes(['image/*'])
                                ->uniqueName()
                                ->storage('feriaImages'),
                            Upload::make($this->feria->exists ? 'feria.logo' : 'uploadLogo')
                                    ->title('Logo de la feria')
                                    ->maxFiles(1)
                                    ->acceptedTypes(['image/*'])
                                    ->uniqueName()
                                    ->storage('feriaImages'),
                        ]),
                    ]),
                ],
            ]),

        ];
    }

    public function createOrUpdate(Request $request, Feria $feria)
    {
        $request->validate([
            'feria.name' => 'required',
            'feria.representative' => 'required',
            'feria.address' => 'required',
            'feria.startDate' => 'required',
            'feria.endDate' => 'required',
            'feria.city' => 'required',
        ]);

        // Asigna los campos normales
        $feria->fill($request->get('feria'));

        // Campos de imágenes
        $fieldName1 = $feria->exists ? 'feria.image1' : 'upload1';
        $fieldName2 = $feria->exists ? 'feria.image2' : 'upload2';
        $fieldName3 = $feria->exists ? 'feria.image3' : 'upload3';
        $fieldName4 = $feria->exists ? 'feria.image4' : 'upload4';
        $fieldName5 = $feria->exists ? 'feria.image5' : 'upload5';
        $fieldLogo = $feria->exists ? 'feria.logo' : 'uploadLogo'; // Nuevo campo

        // Asigna los IDs de las imágenes
        if (isset($request->input($fieldName1)[0])) {
            $feria->image1 = $request->input($fieldName1)[0];
        }

        if (isset($request->input($fieldName2)[0])) {
            $feria->image2 = $request->input($fieldName2)[0];
        }

        if (isset($request->input($fieldName3)[0])) {
            $feria->image3 = $request->input($fieldName3)[0];
        }

        if (isset($request->input($fieldName4)[0])) {
            $feria->image4 = $request->input($fieldName4)[0];
        }

        if (isset($request->input($fieldName5)[0])) {
            $feria->image5 = $request->input($fieldName5)[0];
        }

        // Guarda el logo
        if (isset($request->input($fieldLogo)[0])) {
            $feria->logo = $request->input($fieldLogo)[0];
        }

        // Guarda el modelo
        $feria->save();

        // Relaciona las imágenes con la feria
        $feria->attachment()->syncWithoutDetaching($request->input($fieldName1, []));
        $feria->attachment()->syncWithoutDetaching($request->input($fieldName2, []));
        $feria->attachment()->syncWithoutDetaching($request->input($fieldName3, []));
        $feria->attachment()->syncWithoutDetaching($request->input($fieldName4, []));
        $feria->attachment()->syncWithoutDetaching($request->input($fieldName5, []));
        $feria->attachment()->syncWithoutDetaching($request->input($fieldLogo, [])); // Relaciona el logo

        Toast::info(__('Cambios guardados correctamente.'));

        return redirect()->route('platform.ferias');
    }

    public function remove(Feria $feria)
    {
        // Elimina las imágenes adjuntas del modelo Feria
        $feria->getMedia()->each(function ($media) {
            $media->delete();
        });

        // Elimina el registro de Feria
        $feria->delete();

        Alert::success('Éxito. Has eliminado la compañía con éxito.');

        return redirect()->route('platform.ferias');
    }

    public function scripts()
    {
        return <<<'JS'
            document.addEventListener('DOMContentLoaded', function() {
                const fileInputs = document.querySelectorAll('[data-test^="feria.image"]');

                fileInputs.forEach(function(inputField) {
                    inputField.addEventListener('change', function(event) {
                        const fileName = event.target.files[0].name; // Obtén el nombre del archivo
                        const fileNameDisplay = inputField.closest('.form-group').querySelector('.form-help');

                        fileNameDisplay.textContent = fileName;
                    });
                });
            });
        JS;
    }
}
