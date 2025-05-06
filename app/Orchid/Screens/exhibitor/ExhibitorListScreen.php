<?php

namespace App\Orchid\Screens\exhibitor;

use App\Models\Exhibitor;
use App\Orchid\Layouts\exhibitor\ExhibitorListLayout;
use App\Orchid\Layouts\exhibitor\showDetailsDescription;
use App\Traits\OrganizationTrait;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ExhibitorListScreen extends Screen
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
        $query = Exhibitor::query();

        (! $idOrg->hasAccess('platform.systems.*'))
            ? $query->where('user_id', $idOrg->id)
            : null;

        return [
            'exhibitors' => $query->filters()
                ->defaultSort('id')
                ->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Listas de expositores';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'All blog exhibitors';
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
                ->route('platform.exhibitor.create'),
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
            ExhibitorListLayout::class,
            Layout::modal('showDescription', [ // Debes envolver el modal en un array
                showDetailsDescription::class,
            ])->title('Descriptions')
                ->closeButton('Close')
                ->withoutApplyButton()
                ->async('asyncGetExhibitor'),
        ];
    }

    public function asyncGetExhibitor(Exhibitor $exhibitor): iterable
    {
        return [
            'exhibitor' => $exhibitor,
        ];
    }

    public function remove($id)
    {
        $exhibitor = Exhibitor::findOrFail($id);
        $exhibitor->delete($id);
        Alert::info('You have successfully deleted the exhibitor.');

        return redirect()->route('platform.exhibitors');
    }
}
