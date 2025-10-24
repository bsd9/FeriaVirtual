<?php

namespace App\Orchid\Screens;

use App\Models\Stand;
use App\Orchid\Layouts\FeriaModalRow;
use App\Orchid\Layouts\StandsListLayout;
use App\Traits\OrganizationTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class StandsListScreen extends Screen
{
    use OrganizationTrait;

    /**
     * Fetch data to be displayed on the screen.L
     *
     * @return array
     */
    public function query(): iterable
    {
        $idOrg = $this->getOrganization();
        $query = Stand::query();

        (! $idOrg->hasAccess('platform.systems.*'))
            ? $query->where('user_id', $idOrg->id)
            : null;

        return [
            'stands' => $query->filters()
                ->defaultSort('id')
                ->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Listas de Stands';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'All blog stands';
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
                ->route('platform.stands.create'),
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
            StandsListLayout::class,
            Layout::modal('editOrCreateFeria', [
                FeriaModalRow::class,
            ])->title('Add feria')
                ->closeButton('Close')
                ->withoutApplyButton()
                ->async('asyncGetFeria'),

        ];
    }

    public function asyncGetFeria(Stand $stand): iterable
    {
        return [
            'stand' => $stand,
        ];
    }

    public function remove(Request $request)
    {
        Stand::findOrfail($request->get('id'))->delete();
        Toast::info(__('Stand eliminado'));
    }
}
// {"platform.systems.attachment":"1","platform.systems.roles":"1","platform.systems.users":"1","analytics":"1","monitor":"1","platform.index":"1"}
