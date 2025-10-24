<?php

namespace App\Orchid\Screens\exhibitor;

use App\Models\Exhibitor;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ExhibitorEditScreen extends Screen
{
    public $exhibitor;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Exhibitor $exhibitor): iterable
    {
        return [
            'exhibitor' => $exhibitor,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->exhibitor->exists ? 'Edit exhibitor' : 'Creating a new exhibitor';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return $this->exhibitor->exists ? 'Blog edit exhibitor' : 'Blog creating a new exhibitor';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Create course')
                ->icon('database-add')
                ->method('createOrUpdate')
                ->class('btn btn-dark')
                ->canSee(! $this->exhibitor->exists),

            Button::make('Update')
                ->icon('bs.check-circle')
                ->method('createOrUpdate')
                ->class('btn btn-warning')
                ->canSee($this->exhibitor->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->class('btn btn-danger')
                ->canSee($this->exhibitor->exists),
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
                        Input::make('exhibitor.name')
                            ->title('Name')
                            ->placeholder('Enter the name of the fair')
                            ->help('Specify a short descriptive title for this fair.')
                            ->required(),
                        Input::make('exhibitor.website')
                            ->title('WebSite')
                            ->placeholder('Enter the name of the fair')
                            ->help('Specify a short descriptive title for this fair.')
                            ->required(),
                    ]),

                ]),
                Layout::rows([
                    TextArea::make('exhibitor.description')
                        ->title('Description')
                        ->placeholder('Enter the address of the fair')
                        ->rows(6)
                        ->style('width: 100%')
                        ->help('Specify the address for this fair.')
                        ->required(),
                    Upload::make($this->exhibitor->exists ? 'exhibitor.image' : 'upload')
                        ->storage('configurations'),
                ]),

            ]),

        ];
    }

    public function createOrUpdate(Request $request, Exhibitor $exhibitor)
    {
        $request->validate([
            'exhibitor.name' => 'required',
            'exhibitor.description' => 'required',
            'exhibitor.website' => 'required',

        ]);

        $exhiInput = $exhibitor->exists ? 'exhibitor.image' : 'upload';

        $exhibitor->user()->associate(auth()->user());
        $exhibitor->fill($request->get('exhibitor'));

        if (isset($request->input($exhiInput)[0])) {
            $exhibitor->image = $request->input($exhiInput)[0];
        }

        $exhibitor->save();

        $exhibitor->attachment()->syncWithoutDetaching(
            $request->input($exhiInput, [])
        );

        // Mensaje de éxito
        Toast::info(__('Change made successfully.'));
        Alert::info('You have successfully created or updated the exhibitor.');

        return redirect()->route('platform.exhibitors');
    }

    protected function clearImageCollection(Exhibitor $exhibitor)
    {
        $exhibitor->clearMediaCollection('images');
    }

    protected function addImageToCollection(Exhibitor $exhibitor, Request $request)
    {
        if ($request->hasFile('avatar')) {
            $exhibitor->addMedia($request->file('avatar'))->toMediaCollection('images');
        }
        if ($request->hasFile('exhibitor.avatar')) {
            $exhibitor->addMediaFromRequest('exhibitor.avatar')->toMediaCollection('images');
        }
    }

    public function remove()
    {
        $this->exhibitor->delete();
        Alert::info('You have successfully deleted the exhibitor.');

        return redirect()->route('platform.exhibitors');
    }
}
