<?php

namespace App\Orchid\Layouts\configutations;

use App\Models\Configuration;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ConfigurationListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'configurations';

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
                ->render(function (Configuration $configuration) {
                    $image = $configuration->attachment()->first();

                    return '<img src="'.($image ? $image->url() : '').'" alt="imagen no encontrada" class="img-thumbnail rounded-circle" style="width: 90px; height: 90px;">';

                }),

            TD::make('name', 'Nombre')
                ->sort()
                ->filter(Input::make()->name('Filtrar'))
                ->render(function (Configuration $configuration) {
                    return Link::make($configuration->name)
                        ->route('platform.configuration.edit', $configuration);
                }),

            TD::make('level', 'Nivel')
                ->sort()
                ->filter(Input::make()->name('Filtrar'))
                ->render(fn (Configuration $config) => match ($config->level) {
                    'basic' => '<span class="badge text-bg-primary">Básico</span>',
                    'medium' => '<span class="badge text-bg-danger">Medio</span>',
                    'high' => '<span class="badge text-bg-success">Alto</span>',
                    default => "<span class='text-default badge'>$config->level</span>",
                }),

            TD::make('url', 'Web')
                ->sort()
                ->filter(Input::make()->name('Filter by id'))
                ->render(function (Configuration $configuration) {
                    return Link::make($configuration->url)
                        ->icon('globe2')
                        ->route('platform.configuration.edit', $configuration);
                }),

            TD::make('whatsapp', 'Whatsapp')
                ->sort()
                ->filter(Input::make()->name('Filter by id'))
                ->render(function (Configuration $configuration) {
                    return Link::make($configuration->whatsapp)
                        ->icon('whatsapp')
                        ->route('platform.configuration.edit', $configuration);
                }),
            TD::make('facebook', 'Facebook')
                ->sort()
                ->filter(Input::make()->name('Filter by id'))
                ->render(function (Configuration $configuration) {
                    return Link::make($configuration->facebook)
                        ->icon('facebook')
                        ->route('platform.configuration.edit', $configuration);
                }),
            TD::make('instagram', 'Instagram')
                ->sort()
                ->filter(Input::make()->name('Filter by id'))
                ->render(function (Configuration $configuration) {
                    return Link::make($configuration->instagram)
                        ->icon('instagram')
                        ->route('platform.configuration.edit', $configuration);
                }),

            TD::make('phone', 'Telefono')
                ->sort()
                ->filter(Input::make()->name('Filter by id'))
                ->render(function (Configuration $configuration) {
                    return Link::make($configuration->phone)
                        ->icon('phone-fill')
                        ->route('platform.configuration.edit', $configuration);
                }),
            TD::make('email', 'Email')
                ->sort()
                ->filter(Input::make()->name('Filter by id'))
                ->render(function (Configuration $configuration) {
                    return Link::make($configuration->email)
                        ->icon('mailbox')
                        ->route('platform.configuration.edit', $configuration);
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Configuration $configuration) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.configuration.edit', $configuration)
                            ->icon('pencil'),
                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Advertencia.! Esta acción es irreversible. ¿Estás seguro de que deseas continuar?'))
                            ->method('remove', [
                                'id' => $configuration->id,
                            ]),
                    ])),
        ];
    }
}
