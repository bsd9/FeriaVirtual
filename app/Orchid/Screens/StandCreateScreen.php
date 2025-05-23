<?php

namespace App\Orchid\Screens;

use App\Models\Feria;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class StandCreateScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Create new stand';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

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
            Layout::view('stand.create', [
                'ferias' => Feria::select('name', 'id')->get(),
            ]),
        ];
    }
}
