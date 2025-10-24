<?php

namespace App\Orchid\Screens\dashboard;

use App\Models\Attendee;
use App\Models\Category;
use App\Models\Feria;
use App\Models\Stand;
use App\Orchid\Layouts\chart\ExhibitorChartPie;
use App\Orchid\Layouts\Examples\ChartBarExample;
use App\Orchid\Layouts\Examples\ChartLineExample;
use App\Orchid\Layouts\Examples\ChartPieExample;
use App\Traits\OrganizationTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Chart;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class DashboardScreen extends Screen
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

        return [
            'charts' => [
                [
                    'name' => 'Some Data',
                    'values' => Category::withCount('attendees')
                        ->orderByDesc('attendees_count')
                        ->take(5)->pluck('attendees_count'),
                    'labels' => Category::take(5)
                        ->pluck('name'),
                ],
            ],

            'feriasCountStands' => [
                [
                    'name' => 'Ferias con más stands',
                    'values' => Feria::withCount('attendees')
                        ->orderByDesc('attendees_count')
                        ->take(5)
                        ->pluck('attendees_count'),
                    'labels' => Feria::take(5)
                        ->pluck('name'),
                ],
            ],

        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Panel de administración';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Resumen de las características de los componente en la feria.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    // public function commandBar(): iterable
    // {
    //     return [
    //         Button::make('Show toast')
    //             ->method('showToast')
    //             ->novalidate()
    //             ->icon('bs.chat-square-dots'),

    //         ModalToggle::make('Launch demo modal')
    //             ->modal('exampleModal')
    //             ->method('showToast')
    //             ->icon('bs.window'),
    //     ];
    // }

    /**
     * The screen's layout elements.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        $idOrg = $this->getOrganization();

        $standCount = ($idOrg->hasAccess('platform.systems.users'))
            ? Stand::count()
            : Stand::where('user_id', $idOrg->id)->count();

        $attendeeCount = ($idOrg->hasAccess('platform.systems.users'))
            ? Attendee::count()
            : Attendee::where('user_id', $idOrg->id)->count();

        return [

            Layout::view('dashboard.metrics', [
                'fairCount' => Feria::count(),
                'categoryCount' => Category::count(),
                'standCount' => $standCount,
                'attendeeCount' => $attendeeCount,
            ]),

            Layout::columns([
                ChartLineExample::make('charts', 'Categorías favoritas')
                    ->description('Visualice las  7 categorías preferidas  por los visitantes.'),

                // ChartBarExample::make('charts', 'Bar Chart')
                //     ->description('Compare data sets with colorful bar graphs.'),
                ChartPieExample::make('charts', 'Diagrama de pastel')
                    ->description('Visualice las  7 categorías preferidas  por los visitantes.'),
            ]),
            Layout::columns([

                ExhibitorChartPie::make('feriasCountStands', 'Cantidad de stands por feria.')
                    ->description('visualice las 7 erias con mas stands.'),
            ]),

            Layout::modal('exampleModal', Layout::rows([
                Input::make('toast')
                    ->title('Messages to display')
                    ->placeholder('Hello world!')
                    ->help('The entered text will be displayed on the right side as a toast.')
                    ->required(),
            ]))->title('Create your own toast message'),
        ];
    }

    // public function showToast(Request $request): void
    // {
    //     Toast::warning($request->get('toast', 'Hello, world! This is a toast message.'));
    // }
}
