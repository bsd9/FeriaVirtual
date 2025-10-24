<?php

namespace App\Orchid\Screens\companies;

use App\Models\Company;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CompaniesEditScreen extends Screen
{
    public $company;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Company $company): iterable
    {
        return [
            'company' => $company,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->company->exists ? 'Editar informacion de una compañia' : 'Crear nueva compañia';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Lista de compañias en el sistema.';
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
                ->canSee(! $this->company->exists),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->company->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->class('btn btn-danger')
                ->canSee($this->company->exists),
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
                'Pack 1' => [
                    Layout::rows([
                        Input::make('company.company')
                            ->title('Razon social')
                            ->placeholder('Razón social ')
                            ->required()
                            ->help('Digite la razón social de la compañía.'),
                        TextArea::make('company.description')
                            ->title('Descripción de la compañia')
                            ->rows(5)
                            ->required(),

                    ]),
                ],
                'Redes' => [
                    Layout::rows([
                        Input::make('company.facebook')
                            ->title('Página de Facebook')
                            ->help('Ingrese la página de Facebook de la compañía.')
                            ->required()
                            ->type('url'),

                        Input::make('company.instagram')
                            ->title('Página de Intagram')
                            ->help('Ingrese la página de instagram de la compañía.')
                            ->required()
                            ->type('url'),
                        Input::make('company.whatsapp')
                            ->title('Chat de Whatsapp')
                            ->help('Ingrese el chat de whatsappde la compañía.')
                            ->required()
                            ->type('url'),
                        Input::make('company.twitter')
                            ->title('Página de Twitter')
                            ->help('Ingrese la página de Twitter de la compañía.')
                            ->required()
                            ->type('url'),

                        Input::make('company.pagina_web')
                            ->title('Página oficial de la compañía')
                            ->help('Ingrese la página de Oficial de la compañía.')
                            ->required()
                            ->type('url'),
                        Input::make('company.linkedin')
                            ->title('Página de Linkedin')
                            ->help('Ingrese la página de Twitter de la compañía.')
                            ->required()
                            ->type('url'),

                    ]),
                ],
                'Multimedia' => [
                    Layout::rows([
                        Upload::make($this->company->exists ? 'company.image' : 'upload')
                            ->title('Logon de la empresa')
                            ->storage('companies'),
                        Upload::make($this->company->exists ? 'company.miniatura' : 'upload2')
                            ->title('Mniatura')
                            ->maxFiles(1)
                            ->acceptedTypes(['image/*'])
                            ->uniqueName()
                            ->storage('companies'),

                        Input::make('company.ifrema')
                            ->title('Iframe primario')
                            ->help('Ingrese el vinculo del iframe de la compañia.')
                            ->required()
                            ->type('url'),
                        Input::make('company.ifrema_2')
                            ->title('Iframe segundo')
                            ->help('Ingrese el vinculo del iframe de la compañia.')
                            ->required()
                            ->type('url'),
                        Input::make('company.ifrema_3')
                            ->title('Iframe tercero')
                            ->help('Ingrese el vinculo del iframe de la compañia.')
                            ->required()
                            ->type('url'),
                    ]),

                ],
            ]),

        ];
    }

    public function createOrUpdate(Request $request, Company $company)
    {
        $request->merge(['post' => [$request->get('company')]]);

        $input = $company->exists ? 'company.image' : 'upload';
        $fieldName2 = $company->exists ? 'company.miniatura' : 'upload2';

        $value = $request->get('company');

        $company->fill($value);

        if (isset($request->input($input)[0])) {
            $company->image = $request->input($input)[0];
        }
        if (isset($request->input($fieldName2)[0])) {
            $company->miniatura = $request->input($fieldName2)[0];
        }

        $company->save();

        $company->attachment()->syncWithoutDetaching(
            $request->input($input, [])
        );

        $company->attachment()->syncWithoutDetaching(
            $request->input($fieldName2, [])
        );

        Alert::info('Compañia creada con éxito');

        return redirect()->route('platform.companies');
    }

    public function remove($id)
    {
        $company = Company::findOrfail($id);
        $company->delete();
        Alert::info('Has eliminado una compañía con éxito');

        return redirect()->route('platform.companies');
    }
}
