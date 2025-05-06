<?php

namespace App\Orchid\Screens\attendees;

use App\Models\Attendee;
use App\Orchid\Layouts\attendees\AttendeesListLayout;
use App\Traits\OrganizationTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class AttendeesListScreen extends Screen
{
    use OrganizationTrait;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $idOrg = $this->getOrganization();
        $query = Attendee::query();

        (! $idOrg->hasAccess('platform.systems.*'))
            ? $query->where('user_id', $idOrg->id)
            : null;

        return [
            'attendees' => $query->filters()
                ->defaultSort('id')
                ->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Attendees List';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'All blog Attendees';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Nuevo')
                ->icon('pen')
                ->route('platform.attendee.create'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [AttendeesListLayout::class];
    }

    public function remove(Request $request)
    {

        $popup = Attendee::find($request->get('id'))->delete();
        Toast::info(__('Stand eliminado'));
    }
}
