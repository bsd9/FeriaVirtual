<?php

namespace App\Orchid\Screens\Popus;

use App\Models\Popups;
use App\Orchid\Layouts\Popus\PopupsListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class PopupsListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'popups' => Popups::filters()->defaultSort('id')->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Ventana Emergenta(POPUPS)';
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
                ->route('platform.popups.create'),
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
            PopupsListLayout::class,
        ];
    }

    public function remove($id)
    {
        $popup = Popups::findOrfail($id);
        $popup->delete();
        Alert::success('Éxito. Has eliminado la configuracion con éxito.');

        return redirect()->route('platform.popups');

    }
}
