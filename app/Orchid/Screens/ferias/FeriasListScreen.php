<?php

namespace App\Orchid\Screens\ferias;

use App\Models\Feria;
use App\Orchid\Layouts\FeriaModalRow;
use App\Orchid\Layouts\ferias\FeriasListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class FeriasListScreen extends Screen
{
    //  /**
    //  * Permission
    //  *
    //  * @return iterable|null
    //  */
    // public function permission(): ?iterable
    // {
    //     return [
    //         'modules.Access to data analytics'
    //     ];
    // }
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'ferias' => Feria::filters()
                ->defaultSort('id')
                ->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Listado de ferias';
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
                ->route('platform.feria.create'),

            //            ModalToggle::make('Add')
            //                ->modal('editOrCreateFeria')
            //                ->method('createOrUpdate')
            //                ->icon('pencil')
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
            FeriasListLayout::class,

            Layout::modal('editOrCreateFeria', [ // Debes envolver el modal en un array
                FeriaModalRow::class,
            ])->title('Nueva Feria')
                ->applyButton('Enviar')
                ->closeButton('Cerrar')
                ->async('asyncGetFeria'),
        ];
    }

    /**
     * @return array
     */
    public function asyncGetFeria(Feria $feria): iterable
    {
        return [
            'feria' => $feria,
        ];
    }

    public function remove($id)
    {
        $feria = Feria::findOrFail($id);
        $feria->delete($id);
        Alert::success('Éxito. Has eliminado la stand con éxito.');

        return redirect()->route('platform.ferias');
    }
}
