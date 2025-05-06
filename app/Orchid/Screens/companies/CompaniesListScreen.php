<?php

namespace App\Orchid\Screens\companies;

use App\Models\Company;
use App\Orchid\Layouts\companies\CompaniesListLayout;
use App\Traits\OrganizationTrait;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class CompaniesListScreen extends Screen
{
    use OrganizationTrait;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'companies' => Company::filters()
                ->defaultSort('id')
                ->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Compañias en el sistema.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Lista de compañias en el sistema';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Nuevo')
                ->icon('pen')
                ->route('platform.company.create'),
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
            CompaniesListLayout::class,
        ];
    }

    public function remove($id)
    {
        $company = Company::find($id);

        if (! $company) {
            Alert::error('Error. La compañía que intentas eliminar no existe.');
        } elseif ($company->stand) {

            Alert::warning('Advertencia. No se puede eliminar la compañía porque está asociada a un stand.');
        } else {
            try {

                $company->delete();
                Alert::success('Éxito. Has eliminado la compañía con éxito.');
            } catch (\Exception $e) {
                Alert::error('Error. Ocurrió un error al intentar eliminar la compañía.');
            }
        }

        return redirect()->route('platform.companies');
    }
}
