<?php

namespace App\Orchid\Layouts\companies;

use App\Models\Company;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CompaniesListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'companies';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'Id')
                ->sort()
                ->render(function (Company $company) {
                    return Link::make($company->id)
                        ->route('platform.company.edit', $company);
                }),
            TD::make('id', 'Logo')
                ->width('150')
                ->render(function (Company $company) {
                    $image = $company->attachment()->first();

                    return '<img src="'.($image ? $image->url() : '').'" alt="imagen no encontrada" class="img-thumbnail rounded-circle" style="width: 90px; height: 90px;">';
                }),
            TD::make('company', 'Razón social')
                ->sort()
                ->filter(Input::make()->name('Filtrar por razón social'))
                ->render(function (Company $company) {
                    return Link::make($company->company)
                        ->route('platform.company.edit', $company);
                }),
            TD::make('facebook', 'Facebook')
                ->sort()
                ->render(function (Company $company) {
                    return Link::make($company->facebook)
                        ->icon('facebook')
                        ->route('platform.company.edit', $company);
                }),
            TD::make('instagram', 'Instagram')
                ->sort()
                ->render(function (Company $company) {
                    return Link::make($company->instagram)
                        ->icon('instagram')
                        ->route('platform.company.edit', $company);
                }),
            TD::make('whatsapp', 'Whatsapp')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Company $company) {
                    return Link::make($company->whatsapp)
                        ->icon('whatsapp')
                        ->route('platform.company.edit', $company);
                }),
            TD::make('twitter', 'Twitter')
                ->sort()
                ->filter(Input::make()->name('Filtrar por razón social'))
                ->render(function (Company $company) {
                    return Link::make($company->twitter)
                        ->icon('twitter')
                        ->route('platform.company.edit', $company);
                }),
            TD::make('linkedin', 'Linkedin')
                ->sort()
                ->filter(Input::make()->name('Filtrar por razón social'))
                ->render(function (Company $company) {
                    return Link::make($company->linkedin)
                        ->icon('linkedin')
                        ->route('platform.company.edit', $company);
                }),
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->render(fn (Company $company) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Editar'))
                            ->route('platform.company.edit', $company)
                            ->icon('pencil'),
                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Desea eliminar de forma permanente esta compañía? . No hay forma de recuperar la información!'))
                            ->method('remove', [
                                'id' => $company->id,
                            ]),
                    ])),

        ];
    }
}
