<?php

namespace App\Orchid\Screens\audience;

use App\Models\Audience;
use App\Orchid\Layouts\audience\AudienceListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class AudienceScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'audience' => Audience::filters()->defaultSort('id')->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Auditorio';
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
                ->route('platform.audiences.create'),
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
            AudienceListLayout::class,
        ];
    }

    public function remove($id)
    {

        $popup = Audience::findOrfail($id);
        $popup->delete();
        Alert::success('Éxito. Has eliminado un auditorio con éxito.');

        return redirect()->route('platform.audiences');

    }
}
