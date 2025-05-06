<?php

declare(strict_types=1);

use App\Orchid\Screens\attendees\AttendeesEditScreen;
use App\Orchid\Screens\attendees\AttendeesListScreen;
use App\Orchid\Screens\blog\BlogEditScreen;
use App\Orchid\Screens\blog\BlogListScreen;
use App\Orchid\Screens\categories\CategoryEditScreen;
use App\Orchid\Screens\categories\CategoryListScreen;
use App\Orchid\Screens\companies\CompaniesEditScreen;
use App\Orchid\Screens\companies\CompaniesListScreen;
use App\Orchid\Screens\configutations\ConfigurationEditScreen;
use App\Orchid\Screens\configutations\ConfigurationListScreen;
use App\Orchid\Screens\dashboard\DashboardScreen;
use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\exhibitor\ExhibitorEditScreen;
use App\Orchid\Screens\exhibitor\ExhibitorListScreen;
use App\Orchid\Screens\facade\HomeEditScreen;
use App\Orchid\Screens\facade\HomeListScreen;
use App\Orchid\Screens\ferias\FeriasEditScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\StandsEditScreen;
use App\Orchid\Screens\StandsListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use App\Orchid\Screens\visitors\VisitorsEditScreen;
use App\Orchid\Screens\visitors\VisitorsListScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', DashboardScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('dashboard', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/form/examples/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/form/examples/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/form/examples/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/form/examples/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/layout/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/charts/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/cards/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

//Route::screen('idea', Idea::class, 'platform.screens.idea');

//Routes stands
Route::screen('stands/{stand}/edit', StandsEditScreen::class)
    ->name('platform.stand.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.stands')
        ->push(__('Edit'), route('platform.stands')));
Route::screen('stand/create', StandsEditScreen::class)
    ->name('platform.stands.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.stands')
        ->push(__('Create'), route('platform.stands')));

Route::screen('stands', StandsListScreen::class)
    ->name('platform.stands')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Stands'), route('platform.stands')));

//Route ferias
Route::middleware(['access:platform.systems.users'])->group(function () {
    Route::screen('ferias/{feria}/show', FeriasEditScreen::class)
        ->name('platform.feria.show')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.ferias')
            ->push(__('Ferias'), route('platform.ferias')));
    Route::screen('ferias/{feria}/edit', FeriasEditScreen::class)
        ->name('platform.feria.edit')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.ferias')
            ->push(__('Ferias'), route('platform.ferias')));
    Route::screen('feria/create', FeriasEditScreen::class)
        ->name('platform.feria.create')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.ferias')
            ->push(__('Ferias'), route('platform.ferias')));

    Route::screen('ferias', \App\Orchid\Screens\ferias\FeriasListScreen::class)
        ->name('platform.ferias')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.index')
            ->push(__('Ferias'), route('platform.ferias')));
});

//Route categories
Route::middleware(['access:platform.systems.users'])->group(function () {
    Route::screen('categories/{category}/show', CategoryEditScreen::class)
        ->name('platform.category.show')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.ferias')
            ->push(__('categories'), route('platform.categories')));

    Route::screen('categories/{category}/edit', CategoryEditScreen::class)
        ->name('platform.category.edit')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.categories')
            ->push(__('categories'), route('platform.categories')));
    Route::screen('category/create', CategoryEditScreen::class)
        ->name('platform.category.create')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.categories')
            ->push(__('categories'), route('platform.categories')));

    Route::screen('categories', CategoryListScreen::class)
        ->name('platform.categories')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('platform.index')
            ->push(__('Categories'), route('platform.categories')));
});

//Routes of exhibitors
Route::screen('exhibitors/{exhibitor}/edit', ExhibitorEditScreen::class)
    ->name('platform.exhibitor.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.exhibitors')
        ->push(__('exhibitors'), route('platform.exhibitors')));
Route::screen('exhibitor/create', ExhibitorEditScreen::class)
    ->name('platform.exhibitor.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.exhibitors')
        ->push(__('categories'), route('platform.exhibitors')));

Route::screen('exhibitors', ExhibitorListScreen::class)
    ->name('platform.exhibitors')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('exhibitors'), route('platform.exhibitors')));

// Routes of attendees
Route::screen('attendees/{attendee}/edit', AttendeesEditScreen::class)
    ->name('platform.attendee.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.attendees')
        ->push(__('attendees'), route('platform.attendees')));
Route::screen('attendee/create', AttendeesEditScreen::class)
    ->name('platform.attendee.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.attendees')
        ->push(__('attendees'), route('platform.attendees')));

Route::screen('attendees', AttendeesListScreen::class)
    ->name('platform.attendees')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('attendees'), route('platform.attendees')));

// Routes of configurations
Route::screen('configurations/{configuration}/edit', ConfigurationEditScreen::class)
    ->name('platform.configuration.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.configurations')
        ->push(__('configurations'), route('platform.configurations')));
Route::screen('configuration/create', ConfigurationEditScreen::class)
    ->name('platform.configuration.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.configurations')
        ->push(__('Configurations'), route('platform.configurations')));
Route::screen('configurations', ConfigurationListScreen::class)
    ->name('platform.configurations')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Configurations'), route('platform.configurations')));

// Routes of companies
Route::screen('companies/{company}/edit', CompaniesEditScreen::class)
    ->name('platform.company.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.companies')
        ->push(__('companies'), route('platform.companies')));
Route::screen('company/create', CompaniesEditScreen::class)
    ->name('platform.company.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.companies')
        ->push(__('Companies'), route('platform.companies')));
Route::screen('companies', CompaniesListScreen::class)
    ->name('platform.companies')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('companies'), route('platform.companies')));

// Routes of popups
Route::screen('popups/{popup}/edit', \App\Orchid\Screens\Popus\PopupsEditScreen::class)
    ->name('platform.popup.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.popups')
        ->push(__('Popups'), route('platform.popups')));
Route::screen('popup/create', \App\Orchid\Screens\Popus\PopupsEditScreen::class)
    ->name('platform.popups.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.popups')
        ->push(__('Popups'), route('platform.popups')));
Route::screen('popups', \App\Orchid\Screens\Popus\PopupsListScreen::class)
    ->name('platform.popups')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Popups'), route('platform.popups')));

// Routes of audience
Route::screen('audiences/{audience}/edit', \App\Orchid\Screens\audience\AudienceEditScreen::class)
    ->name('platform.audience.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.audiences')
        ->push(__('Audiences'), route('platform.audiences')));
Route::screen('audience/create', \App\Orchid\Screens\audience\AudienceEditScreen::class)
    ->name('platform.audiences.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.audiences')
        ->push(__('Audiences'), route('platform.audiences')));
Route::screen('audiences', \App\Orchid\Screens\audience\AudienceScreen::class)
    ->name('platform.audiences')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Audiences'), route('platform.audiences')));

// Routes of fachada
Route::screen('principals/{principal}/edit', HomeEditScreen::class)
    ->name('platform.principal.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.principals')
        ->push(__('Editar'), route('platform.principals')));
Route::screen('principal/create', HomeEditScreen::class)
    ->name('platform.principals.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.principals')
        ->push(__('Crear'), route('platform.principals')));
Route::screen('principals', HomeListScreen::class)
    ->name('platform.principals')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Listado'), route('platform.principals')));

// Routes of blog
Route::screen('blogs/{blog}/edit', BlogEditScreen::class)
    ->name('platform.blog.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.blogs')
        ->push(__('Editar'), route('platform.blogs')));
Route::screen('blog/create', BlogEditScreen::class)
    ->name('platform.blogs.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.blogs')
        ->push(__('Crear'), route('platform.blogs')));
Route::screen('blogs', BlogListScreen::class)
    ->name('platform.blogs')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Listado'), route('platform.blogs')));

//visitors
Route::screen('visitors/{visitor}/edit', VisitorsEditScreen::class)
    ->name('platform.visitor.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.visitors')
        ->push(__('Editar'), route('platform.visitors')));
Route::screen('visitor/create', VisitorsEditScreen::class)
    ->name('platform.visitors.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.visitors')
        ->push(__('Crear'), route('platform.visitors')));
Route::screen('visitors', VisitorsListScreen::class)
    ->name('platform.visitors')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Listado'), route('platform.visitors')));


//Event
Route::screen('events/{event}/edit', \App\Orchid\Screens\event\EventEditScreen::class)
    ->name('platform.event.edit')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.events')
        ->push(__('Editar'), route('platform.events')));
Route::screen('event/create', \App\Orchid\Screens\event\EventEditScreen::class)
    ->name('platform.events.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.events')
        ->push(__('Crear'), route('platform.events')));
Route::screen('events', \App\Orchid\Screens\event\EventListScreen::class)
    ->name('platform.events')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Listado'), route('platform.events')));

Route::prefix('platform')->group(function () {
    Route::get('/documentacion', function () {
        return view('documentation.getStarter.intro');
    })->name('platform.intro');

    Route::get('/clientes', function () {
        return view('documentation.clientes.client');
    })->name('platform.clientes');

    Route::get('/configuracion', function () {
        return view('documentation.configuracion.compania');
    })->name('platform.compania');
    Route::get('/compania', function () {
        return view('documentation.configuracion.compania');
    })->name('platform.compania');
    Route::get('/feria', function () {
        return view('documentation.configuracion.feria');
    })->name('platform.feria');
    Route::get('/estantes', function () {
        return view('documentation.configuracion.estantes');
    })->name('platform.estantes');
    Route::get('/auditorio', function () {
        return view('documentation.configuracion.auditorio');
    })->name('platform.auditorio');

    Route::get('/configuracion-de-organizacion', function () {
        return view('documentation.configAccess.organization');
    })->name('platform.config.organizacion');
    Route::get('/configuracion-de-roles', function () {
        return view('documentation.configAccess.role');
    })->name('platform.config.roles');

    Route::get('/expositores-asistentes', function () {
        return view('documentation.expoAsiste.asistem');
    })->name('platform.expo.asistentes');
    Route::get('/expositores-expositores', function () {
        return view('documentation.expoAsiste.exhibitor');
    })->name('platform.expo.expositores');
    Route::get('/expositores-eventos', function () {
        return view('documentation.expoAsiste.events');
    })->name('platform.expo.eventos');

    Route::get('/fachada', function () {
        return view('documentation.facade.facade');
    })->name('platform.fachada.fachada');

    Route::get('/expositores-eventos', function () {
        return view('documentation.expoAsiste.events');
    })->name('platform.expo.eventos');


    Route::get('/fair360-new', function () {
        return view('documentation.fair360.new');
    })->name('platform.fair360.new');

    Route::get('/organizacion-categorias', function () {
        return view('documentation.organization.catgory');
    })->name('platform.organizacion.category');
    Route::get('/organizacion-poppus', function () {
        return view('documentation.organization.popups');
    })->name('platform.organizacion.poppus');


});

