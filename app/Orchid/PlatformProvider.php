<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Clientes')
                ->icon('person')
                ->divider()
                ->list([
                    Menu::make('Visitantes')
                        ->icon('mic')
                        ->route('platform.visitors')
                        ->style('margin: 3px;')
                ]),

            Menu::make('Configuración')
                ->icon('gear')
                ->divider()
                ->style('margin: 3px;')
                ->list([
                    Menu::make('Compañías')
                        ->icon('building-fill')
                        ->route('platform.companies'),
                    Menu::make('Ferias')
                        ->icon('collection')
                        ->route('platform.ferias')
                        ->permission('platform.systems.users'),
                    Menu::make('Stands')
                        ->icon('layers')
                        ->route('platform.stands'),
                    Menu::make('Auditorio')
                        ->icon('mic')
                        ->route('platform.audiences'),
                ]),

            Menu::make('Configuración y accesos')
                ->icon('gear')
                ->divider()
                ->style('margin: 3px;')
                ->list([
                    Menu::make(__('Organización'))
                        ->icon('bs.people')
                        ->route('platform.systems.users')
                        ->permission('platform.systems.users'),
//                    Menu::make(__('Roles'))
//                        ->icon('bs.lock')
//                        ->route('platform.systems.roles')
//                        ->permission('platform.systems.roles')

                ]),

            Menu::make('Expositores y Asistentes')
                ->icon('person-walking')
                ->divider()
                ->style('margin: 3px;')
                ->list([
                    Menu::make('Asistentes')
                        ->icon('alexa')
                        ->route('platform.attendees'),

                    Menu::make('Expositores')
                        ->icon('megaphone')
                        ->route('platform.exhibitors'),
                    Menu::make('Eventos')
                        ->icon('megaphone')
                        ->route('platform.events'),
                ]),

            Menu::make('Fachada Imágenes')
                ->icon('buildings')
                ->divider()
                ->style('margin: 3px;')
                ->list([
                    Menu::make('Fachada principal')
                        ->icon('building-fill')
                        ->route('platform.principals')
                ]),

            Menu::make('Fair360')
                ->icon('0-circle')
                ->divider()
                ->style('margin: 3px;')
                ->list([
                    Menu::make('Noticias')
                        ->icon('newspaper')
                        ->route('platform.blogs')
                ]),

            Menu::make('Organización')
                ->icon('house-door')
                ->divider()
                ->style('margin: 3px;')
                ->list([
                    Menu::make('Categoría')
                        ->icon('tags')
                        ->background('#26232f70')
                        ->route('platform.categories')
                        ->permission('platform.systems.*'),

//                    Menu::make('Popups')
//                        ->icon('window-stack')
//                        ->route('platform.popups')
//                        ->permission('platform.systems.*'),
                ]),

            Menu::make('Empresa')
                ->icon('gear-wide-connected')
                ->route('platform.configurations')
                ->permission('platform.systems.*'),

            Menu::make('Documentación')
                ->icon('gear-wide-connected')
                ->route('platform.intro')
                ->permission('platform.systems.*'),
        ];

    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
