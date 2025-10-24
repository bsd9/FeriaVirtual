<?php

namespace App\Orchid\Screens\configutations;

use App\Models\Configuration;
use App\Orchid\Layouts\configutations\ConfigurationListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class ConfigurationListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'configurations' => Configuration::filters()->defaultSort('id')->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Configuraciones de la Empresa';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return 'Lista de Configuraciones de la Empresa';
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
                ->route('platform.configuration.create'),
        ];
    }

    public function asyncGetConfig(Configuration $config)
    {
        $config->load('configurations');
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            ConfigurationListLayout::class,
        ];
    }

    public function remove($id)
    {
        $config = Configuration::findOrfail($id);
        $config->delete();
        Alert::error('Has eliminado las configuraciones exitosamente.');

        return redirect()->route('platform.configurations');
    }
}
