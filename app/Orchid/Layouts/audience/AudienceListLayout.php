<?php

namespace App\Orchid\Layouts\audience;

use App\Models\Audience;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AudienceListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'audience';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('Images')
                ->width('200')
                ->render(function (Audience $audience) {
                    $images = $audience->attachment;
                    $html = '';

                    foreach ($images as $image) {
                        $html .= '<img src="'.$image->url().'" alt="imagen" class="img-thumbnail rounded-circle" style="width: 80px; height: 80px;">';
                    }

                    return $html;
                }),
            TD::make('name', 'Titulo')
                ->sort()
                ->filter(Input::make())
                ->render(function (Audience $audience) {
                    return Link::make($audience->name)
                        ->route('platform.audience.edit', $audience);
                }),
            TD::make('name', 'Titulo')
                ->sort()
                ->filter(Input::make())
                ->render(function (Audience $audience) {
                    return Link::make($audience->video_url)
                        ->route('platform.audience.edit', $audience);
                }),
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Audience $audience) => DropDown::make()
                    ->icon('grid-fill')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.popup.edit', $audience)
                            ->icon('pencil'),
                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Advertencia.! Esta acción es irreversible. ¿Estás seguro de que deseas continuar?'))
                            ->method('remove', [
                                'id' => $audience->id,
                            ]),
                    ])),
        ];
    }
}
