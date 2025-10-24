<?php

namespace App\Orchid\Screens\facade;

use App\Models\FacadeScreenFront;
use App\Orchid\Layouts\facade\HomeListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class HomeListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'principals' => FacadeScreenFront::filters()
                ->defaultSort('id')
                ->paginate(4),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Publicidad Principal';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Agregar')
                ->icon('pen')
                ->route('platform.principals.create'),
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
            HomeListLayout::class,
        ];
    }

    public function remove($id)
    {
        $item = FacadeScreenFront::findOrfail($id);
        $item->delete();
        Alert::success('Éxito. Has eliminado la configuracion con éxito.');

        return redirect()->route('platform.principals');

    }
}
