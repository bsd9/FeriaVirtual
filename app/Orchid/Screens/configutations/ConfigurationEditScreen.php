<?php

namespace App\Orchid\Screens\configutations;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ConfigurationEditScreen extends Screen
{
    /**
     * @var Configuration
     */
    public $configuration;

    // 'business_name',
    // 'business_url',
    // 'business_phone',
    // 'business_email',
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Configuration $configuration): iterable
    {
        return [
            'configuration' => $configuration,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->configuration->exists ? 'Editar las configuraciones ' : 'Crear nueva configuracion';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Espacion para las configuraciones globales.';
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
                ->canSee(! $this->configuration->exists),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->configuration->exists),
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
                        Group::make([
                            Input::make('configuration.name')
                                ->title('Nombre del Negocio')
                                ->placeholder('Ingresa el nombre del negocio')
                                ->help('Especifica el nombre de la empresa.')
                                ->required(),
                            Input::make('configuration.url')
                                ->title('URL del Negocio')
                                ->type('url')
                                ->placeholder('Ingresa la URL del negocio')
                                ->help('Especifica la URL de la empresa.')
                                ->required(),
                        ]),
                        Group::make([
                            Input::make('configuration.phone')
                                ->title('Número de Teléfono')
                                ->mask('(999) 999-9999')
                                ->help('Especifica el número de teléfono de la empresa.')
                                ->required(),
                            Input::make('configuration.email')
                                ->type('email')
                                ->placeholder('ejemplo@gmail.com')
                                ->title('Correo Electrónico')
                                ->required()
                                ->help('Especifica el correo electrónico de la empresa.'),
                        ]),
                    ]),
                ],
                'Redes' => [
                    Layout::rows([
                        Group::make([
                            Input::make('configuration.facebook')
                                ->title('Facebook')
                                ->placeholder('Ingresa el enlace de Facebook')
                                ->help('Especifica el enlace de la página de Facebook de la empresa.')
                                ->type('url')
                                ->required(),
                            Input::make('configuration.instagram')
                                ->title('Instagram')
                                ->placeholder('Ingresa el enlace de Instagram')
                                ->help('Especifica el enlace de la cuenta de Instagram de la empresa.')
                                ->type('url')
                                ->required(),
                        ]),
                        Group::make([
                            Input::make('configuration.whatsapp')
                                ->title('WhatsApp')
                                ->placeholder('Ingresa el número de WhatsApp')
                                ->help('Especifica el número de WhatsApp de la empresa.')
                                ->type('url')
                                ->required(),
                            Input::make('configuration.twitter')
                                ->title('X antes Twitter')
                                ->placeholder('Ingresa el la direccion del X')
                                ->help('Especifica la url de la pagina de X.')
                                ->type('url')
                                ->required(),
                            Input::make('configuration.linkedin')
                                ->title('Linkedin')
                                ->placeholder('Ingresa el la pagina del linkedin')
                                ->help('Especifica la url de la pagina de linkedin.')
                                ->type('url')
                                ->required(),
                        ]),



                    ]),
                ],
                'Estados' => [
                    layout::rows([
                        Select::make('configuration.level')
                            ->options([
                                'basic' => 'Básico',
                                'medium' => 'Medio',
                                'high' => 'Alto',
                            ])
                            ->title('Tipo de stand')
                            ->empty('Selecciona uno')
                            ->help('Selecciona el tipo de stand:')
                            ->required(),

                        Upload::make($this->configuration->exists ? 'configuration.image' : 'upload')
                            ->title('Imagen')
                            ->required()
                            ->storage('configurations'),
                    ]),
                ],

            ]),
        ];
    }

    public function createOrUpdate(Request $request, Configuration $configuration)
    {
        $request->validate([
            'configuration.name' => 'required',
            'configuration.url' => 'required',
            'configuration.phone' => 'required',
            'configuration.email' => 'required',
            'configuration.facebook' => ['required', 'url'],
            'configuration.instagram' => ['required', 'url'],
            'configuration.whatsapp' => ['required', 'url'],
        ]);

        $contractInput = $configuration->exists ? 'configuration.image' : 'upload';

        $configuration->fill($request->get('configuration'));
        if (isset($request->input($contractInput)[0])) {
            $configuration->image = $request->input($contractInput)[0];
        }

        $configuration->save();

        $configuration->attachment()->syncWithoutDetaching(
            $request->input($contractInput, [])
        );

        Alert::info('Has creado exitosamente una configuración global.');

        return redirect()->route('platform.configurations');
    }

    protected function clearImageCollection(Configuration $configuration)
    {
        $configuration->clearMediaCollection('images');
    }

    protected function addImageToCollection(Configuration $configuration, Request $request)
    {
        if ($request->hasFile('logo')) {
            $configuration->addMedia($request->file('logo'))->toMediaCollection('images');
        }
        if ($request->hasFile('configuration.logo')) {
            $configuration->addMediaFromRequest('configuration.logo')->toMediaCollection('images');
        }
    }

    public function remove()
    {
        $this->configuration->delete();
        Alert::error('Has eliminado las configuraciones exitosamente.');

        return redirect()->route('platform.configurations');
    }
}
