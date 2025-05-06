<?php

namespace App\Orchid\Screens\visitors;

use App\Mail\ContactMail;
use App\Mail\InfoMail;
use App\Mail\PromotMail;
use App\Models\Visitor;
use Illuminate\Support\Facades\Mail;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class VisitorsEditScreen extends Screen
{
    public $visitor;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Visitor $visitor): iterable
    {
        return [
            'visitor' => $visitor,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->visitor->exists ? 'Editar la informacion del usuario' : 'Crear nuevo visitantev.';
    }

    public function description(): ?string
    {
        return 'Esta información es muy personal, por favor consulte con el cliente sobre estos cambios';
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
                ->canSee(! $this->visitor->exists)
                ->disabled(),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->visitor->exists)
                ->disabled(),
            Button::make('Eliminar')
                ->class('btn btn-danger')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->visitor->exists)
                ->disabled(),
            /* Button::make('Mensajes Informativos')
                 ->class('btn btn-primary')
                 ->icon('send')
                 ->canSee($this->visitor->exists)
                 ->method('sendEmilnfo'),*/
            DropDown::make('mails')
                ->icon('send')
                ->class('btn btn-primary')
                ->list([
                    Button::make(__('Email informativo'))
                        ->method('sendEmilnfoAll')
                        ->class('btn btn-success')
                        ->icon('send')
                        ->confirm('Desea enviar un correo informativo al correo electrónico: '.$this->visitor->email),
                    Button::make(__('Email promocional'))
                        ->method('sendEmilPromotAll')
                        ->class('btn btn-warning')
                        ->icon('send')
                        ->confirm('Desea enviar un correo informativo al correo electrónico: '.$this->visitor->email),
                    Button::make(__('Email de  contacto'))
                        ->method('sendEmilContactAll')
                        ->class('btn btn-primary')
                        ->icon('send')
                        ->confirm('Desea enviar un correo informativo al correo electrónico: '.$this->visitor->email),

                ]),

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

                        Input::make('visitor.rut')
                            ->title('C.C')
                            ->placeholder('Documento de ifentidad')
                            ->required()
                            ->disabled(true),

                        Group::make([
                            Input::make('visitor.name')
                                ->title('Nombre')
                                ->placeholder('Nombre')
                                ->required()
                                ->disabled(true),
                            Input::make('visitor.last_name')
                                ->title('Apellidos')
                                ->placeholder('Apellidos')
                                ->required()
                                ->disabled(true),
                        ]),
                        Group::make([
                            Select::make('visistor.gener')
                                ->options([
                                    'femenino' => 'Femenino',
                                    'masculino' => 'Masculino',
                                    'otros' => 'Otros',
                                ])
                                ->title('Genero')
                                ->help('Seleccione el genero')
                                ->required()
                                ->disabled(),

                            Input::make('visitor.phone')
                                ->title('Telefono')
                                ->placeholder('Telefono')
                                ->required()
                                ->disabled(true),
                        ]),
                        Group::make([
                            Input::make('visitor.nacionality')
                                ->title('Nacionalidad')
                                ->placeholder('Nacionalidad')
                                ->required()
                                ->disabled(true),
                            Input::make('visitor.password')
                                ->title('Contraseña')
                                ->type('password')
                                ->placeholder('Contraseña')
                                ->required()
                                ->disabled(true),
                        ]),
                        Input::make('visitor.email')
                            ->title('Correo electronico')
                            ->placeholder('Correo electrónico')
                            ->required()
                            ->disabled(true),

                    ]),
                ],
            ]),
        ];
    }

    public function sendEmilnfo()
    {
        Mail::to($this->visitor->email)->send(new InfoMail());
    }

    public function sendEmilContact()
    {
        Mail::to($this->visitor->email)->send(new ContactMail());
    }

    public function sendEmilPromot()
    {
        Mail::to($this->visitor->email)->send(new PromotMail());
    }
}
