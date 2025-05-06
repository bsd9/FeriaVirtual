<?php

namespace App\Orchid\Screens;

use App\Models\Company;
use App\Models\Exhibitor;
use App\Models\Feria;
use App\Models\Stand;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class StandsEditScreen extends Screen
{
    /**
     * @var Stand
     */
    public $stand;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Stand $stand): iterable
    {
        return [
            'stand' => $stand,

        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->stand->exists ? 'Edit stand' : 'Creating a new stand';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Blog edit stand';
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
                ->canSee(! $this->stand->exists),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->stand->exists),

            Button::make('Eliminar')
                ->icon('trash')
                ->method('remove')
                ->class('btn btn-danger')
                ->canSee($this->stand->exists),
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
                    Group::make([
                        Input::make('stand.name')
                            ->title('Nombre')
                            ->placeholder('Título atractivo pero misterioso')
                            ->help('Especifica un título descriptivo corto para este producto.')
                            ->required(),

                        Relation::make('stand.feria_id')
                            ->fromModel(Feria::class, 'name')
                            ->title('Elige tu feria'),
                    ]),

                    Group::make([
                        Relation::make('stand.exhibitor_id')
                            ->fromModel(Exhibitor::class, 'name')
                            ->title('Elige tu expositor')
                            ->required(),

                        Select::make('stand.company_id')
                            ->fromModel(Company::class, 'company', 'id')
                            ->title('Selecciona una compañía')
                            ->empty('Compañías no asignadas en su totalidad')
                            ->required(),
                    ]),

                    Group::make([
                        Select::make('stand.type')
                            ->options([
                                'basic' => 'Básico',
                                'medium' => 'Medio',
                                'high' => 'Alto',
                            ])
                            ->title('Tipo de stand')
                            ->empty('Selecciona uno')
                            ->help('Selecciona el tipo de stand:')
                            ->required(),

                        Select::make('stand.is_active')
                            ->options([
                                1 => 'Activo',
                                0 => 'Inactivo',

                            ])
                            ->title('Estado')
                            ->empty('No seleccionado')
                            ->help('Selecciona el tipo de stand:'),
                    ]),

                    TextArea::make('stand.descriptions')
                        ->title('Descripción')
                        ->rows(5)
                        ->required(),
                    Upload::make($this->stand->exists ? 'stand.image' : 'upload')
                        ->storage('configurations'),

                ]),
            ]),
        ];
    }

    public function createOrUpdate(Request $request, Stand $stand, Exhibitor $exhibitor)
    {
        $organizacionId = auth()->user()->id;
        $request->merge(['post' => [$request->get('stand')]]);
        $request->validate([
            'stand.name' => ['required', 'min:10'],
            'stand.descriptions' => ['required'],
            'stand.feria_id' => ['required'],
            'stand.exhibitor_id' => ['required'],
            'stand.type' => ['required'],

        ]);
        $input = $stand->exists ? 'stand.image' : 'upload';

        $value = $request->get('stand');

        $exhibitor->update([
            'estand_id' => $request->id,
        ]);

        $stand->user()->associate($organizacionId);
        $stand->fill($value);

        if (isset($request->input($input)[0])) {
            $stand->image = $request->input($input)[0];
        }

        $stand->save();

        $stand->attachment()->syncWithoutDetaching(
            $request->input($input, [])
        );
        Alert::info('You have successfully created a stand.');

        return redirect()->route('platform.stands');
    }

    public function remove(Stand $stand)
    {
        $stand->delete();
        Alert::info('Has eliminado un stand con éxito');

        return redirect()->route('platform.stands');
    }
}
