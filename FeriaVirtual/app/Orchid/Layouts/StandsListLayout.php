<?php

namespace App\Orchid\Layouts;

use App\Models\Exhibitor;
use App\Models\Stand;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Alert;

class StandsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'stands';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'Logo')
                ->width('150')
                ->render(function (Stand $configuration) {
                    $image = $configuration->attachment()->first();

                    return '<img src="'.($image ? $image->url() : '').'" alt="imagen no encontrada" class="img-thumbnail rounded-circle" style="width: 90px; height: 90px;">';

                }),

            TD::make('name', 'Nombre')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Stand $stand) {
                    return Link::make($stand->name)
                        ->route('platform.stand.edit', $stand);
                }),

            TD::make('type', 'Tipo')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(fn (Stand $stand) => match ($stand->type) {
                    'basic' => '<span class="bg-info badge">Basic</span>',
                    'medium' => '<span class="bg-success badge">Medium</span>',
                    'high' => '<span class="bg-warning badge">High</span>',
                    default => "<span class='text-default badge'>$stand->type</span>",
                })->sort(),

            TD::make('is_active', 'Estado')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(fn (Stand $stand) => match ($stand->is_active) {
                    0 => '<span class="bg-danger badge">Inactivo</span>',
                    default => "<span class='bg-success badge'>Activo</span>",
                })->sort(),

            TD::make('description', 'Description')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(fn (stand $feria) => ModalToggle::make(Str::limit($feria->descriptions, 50))
                    ->modal('editOrCreateFeria')
                    ->modalTitle($feria->name)
                    ->method('createOrUpdate')
                    ->asyncParameters([
                        'stand' => $feria->id,
                    ])),
            TD::make('company_id', 'Compañia')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Stand $stand) {
                    return Link::make($stand->company->company)
                        ->icon('union')
                        ->route('platform.stand.edit', $stand);
                }),

            TD::make('feria_id', 'Feria')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Stand $stand) {
                    return Link::make($stand->feria->name)
                        ->icon('union')
                        ->route('platform.feria.show', $stand);
                }),
            TD::make('exhibitor_id', 'Exhibitor')
                ->sort()
                ->filter(Input::make()->placeholder('Filter by id'))
                ->render(function (Stand $stand) {
                    return Link::make($stand->exhibitor->name)
                        ->icon('union')
                        ->route('platform.feria.show', $stand);
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Stand $stand) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.stand.edit', $stand)
                            ->icon('pencil'),
                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $stand->id,
                            ]),
                        Link::make(__('Show'))
                            ->route('platform.stand.edit', $stand)
                            ->icon('eye'),
                    ])),

        ];
    }

    public function remove(Exhibitor $exhibitor)
    {
        $exhibitor->delete();
        Alert::error('You have successfully deleted exhibitor.');

        return redirect()->route('platform.exhibitors');
    }
}
