<?php

namespace App\Orchid\Screens;

use App\Models\Pavilion;
use App\Orchid\Layouts\PavilionsListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PavilionsListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     */
    public function query(): iterable
    {
        return [
            'pavilions' => Pavilion::filters()
                ->defaultSort('id')
                ->paginate(10),
        ];
    }

    public function name(): ?string
    {
        return 'Listas de Pabellones';
    }

    public function description(): ?string
    {
        return 'All blog pavilions';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Nuevo')
                ->icon('pen')
                ->route('platform.pavilions.create'),
        ];
    }

    public function layout(): iterable
    {
        return [
            PavilionsListLayout::class,
        ];
    }

    public function remove(Request $request)
    {
        Pavilion::findOrFail($request->get('id'))->delete();
        Toast::info(__('Pabellón eliminado'));
    }
}