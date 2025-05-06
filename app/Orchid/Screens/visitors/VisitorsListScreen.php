<?php

namespace App\Orchid\Screens\visitors;

use App\Mail\ContactMail;
use App\Mail\InfoMail;
use App\Mail\PromotMail;
use App\Models\Visitor;
use App\Orchid\Layouts\visitors\VisitorsLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class VisitorsListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'visitors' => Visitor::filters()->defaultSort('id')->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Listado de visitantes';
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
                ->route('platform.visitors.create'),

            DropDown::make('mails')
                ->icon('send')
                ->class('btn btn-primary')
                ->list([
                    Button::make(__('Email informativo'))
                        ->method('sendEmilnfoAllUsers')
                        ->class('btn btn-success')
                        ->icon('send')
                        ->confirm('Desea enviar un correo informativo a todos los visitantes.'),
                    Button::make(__('Email promocional'))
                        ->method('sendEmilPromotAllUsers')
                        ->class('btn btn-warning')
                        ->icon('send')
                        ->confirm('Desea enviar un correo promocional a todos los visitantes.'),
                    Button::make(__('Email de  contacto'))
                        ->method('sendEmilContactAllUsers')
                        ->class('btn btn-primary')
                        ->icon('send')
                        ->confirm('Desea enviar un correo de contacto a todos los visitantes.'),

                ]),

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
            VisitorsLayout::class,
        ];
    }

    private function sendEmailToAllUsers($mailClass)
    {
        $visitors = Visitor::select('email')->get();

        foreach ($visitors as $visitor) {
            Mail::to($visitor->email)->send(new $mailClass());
        }
    }

    public function sendEmilnfoAllUsers()
    {
        $this->sendEmailToAllUsers(InfoMail::class);
    }

    public function sendEmilPromotAllUsers()
    {
        $this->sendEmailToAllUsers(PromotMail::class);
    }

    public function sendEmilContactAllUsers()
    {
        $this->sendEmailToAllUsers(ContactMail::class);
    }

    public function updateOnEvent(Request $request, $id)
    {
        $visitor = Visitor::findOrFail($id);

        $newOnEvent = $visitor->on_event ? 0 : 1;
        $visitor->update(['on_event' => $newOnEvent]);
        return redirect()->back()->with('success', 'Estado actualizado exitosamente');
    }
}
