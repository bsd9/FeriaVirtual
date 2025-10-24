<?php

namespace App\Orchid\Screens\event;

use App\Models\Event;
use App\Orchid\Layouts\blog\BlogListLayout;

use App\Orchid\Layouts\event\EventListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class EventListScreen extends Screen
{

    public function query(): iterable
    {
        return [
            'events' => Event::filters()->defaultSort('id')->paginate(5),
        ];
    }


    public function name(): ?string
    {
        return 'Eventos';
    }


    public function commandBar(): iterable
    {
        return [
            Link::make('Nuevo evento')
                ->icon('pen')
                ->route('platform.events.create'),
        ];
    }


    public function layout(): iterable
    {
        return [
            EventListLayout::class,
        ];
    }
    public function remove(Request $request)
    {
        Event::find($request->get('id'))->delete();
        Toast::info(__('Evento eliminado'));
    }
}
