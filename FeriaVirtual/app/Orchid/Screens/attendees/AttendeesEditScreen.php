<?php

namespace App\Orchid\Screens\attendees;

use App\Models\Attendee;
use App\Models\Category;
use App\Models\Feria;
use App\Models\Stand;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class AttendeesEditScreen extends Screen
{
    public $attendee;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Attendee $attendee): iterable
    {
        return ['attendee' => $attendee];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->attendee->exists ? 'Edit attendee' : 'Creating a new attendee';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Blog edit attendees';
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
                ->canSee(! $this->attendee->exists),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->attendee->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->class('btn btn-danger')
                ->canSee($this->attendee->exists),

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
                    Input::make('attendee.image')
                        ->title('Imagen the attenddee')
                        ->type('file')
                        ->help('select an image.'),
                    Group::make([
                        Input::make('attendee.nombre')
                            ->title('Name')
                            ->placeholder('Enter the name of the attendee')
                            ->help('Specify the name of the attendee.')
                            ->required(),

                        Input::make('attendee.correoElectronico')
                            ->title('Email')
                            ->placeholder('Enter the email of the attendee')
                            ->help('Specify the email address of the attendee.')
                            ->required(),
                    ]),

                    Group::make([
                        Input::make('attendee.empresa')
                            ->title('Empresa')
                            ->placeholder('Enter the company name')
                            ->help('Specify the company name of the attendee.')
                            ->required(),

                        Input::make('attendee.numeroCelular')
                            ->title('Numero de celular')
                            ->mask('(999) 999-9999')
                            ->title('Phone number')
                            ->help('Specify the mobile number of the attendee.')
                            ->required(),
                    ]),

                    Group::make([
                        Relation::make('attendee.feria_id')
                            ->fromModel(Feria::class, 'name')
                            ->title('Choose your feria')
                            ->placeholder('Select the associated feria')
                            ->help('Select the associated feria for this attendee.')
                            ->required(),

                        Relation::make('attendee.stand_id')
                            ->fromModel(Stand::class, 'name')
                            ->title('Choose your stand')
                            ->placeholder('Select the associated stand')
                            ->help('Select the associated stand for this attendee.')
                            ->required(),
                    ]),

                    Relation::make('attendee.interests')
                        ->fromModel(Category::class, 'name')
                        ->multiple()
                        ->title('Choose your ideas')
                        ->help('Select the interests  for this attendee.'),

                ]),
            ]),
        ];
    }

    public function createOrUpdate(Request $request, Attendee $attendee)
    {
        $request->merge(['post' => $request->get('attendee')]);

        $request->validate([
            'attendee.nombre' => ['required', 'min:20'],
            'attendee.correoElectronico' => ['required', 'email'],
            'attendee.empresa' => ['required', 'min:10'],
            'attendee.interests' => ['required', 'array', 'min:1'],
            'attendee.numeroCelular' => ['required', 'min:10'],
            'attendee.feria_id' => ['required'],
            'attendee.stand_id' => ['required'],
            'attendee.image' => ['required', 'image'],
        ]);

        $this->clearMediaCollection($attendee);
        $this->addImageToCollection($attendee, $request);

        $values = $request->get('attendee');
        $interests = $values['interests'];
        unset($values['interests']);

        $attendee->user()->associate(auth()->user());
        $attendee->fill($values)->save();

        $attendee->interests()->sync($interests, []);

        Toast::info(__('Change made successfully.'));
        Alert::info('You have successfully created or updated the attendees.');

        return redirect()->route('platform.attendees');
    }

    public function clearMediaCollection(Attendee $attendee)
    {
        $attendee->clearMediaCollection('avatarsAttendees');
    }

    public function addImageToCollection(Attendee $attendee, Request $request)
    {
        if ($request->hasFile('attendee.image')) {
            $attendee->addMediaFromRequest('attendee.image')->toMediaCollection('avatarsAttendees');
        }
    }

    public function remove()
    {
        $result = $this->attendee->delete();
        if ($result) {
            Alert::error('Accion no realizada!');
        }
        Alert::error('Has! Eliminado un aventana un asistenete exitosamente.');

        return redirect()->route('platform.attendees');

    }
}
