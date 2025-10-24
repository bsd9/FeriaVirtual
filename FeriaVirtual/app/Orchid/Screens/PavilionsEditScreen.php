<?php

namespace App\Orchid\Screens;

use App\Models\Pavilion;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Alert;

class PavilionsEditScreen extends Screen
{
    public $pavilion;

    public function query(Pavilion $pavilion): iterable
    {
        return ['pavilion' => $pavilion];
    }

    public function name(): ?string
    {
        return $this->pavilion->exists ? 'Editar pabellón' : 'Crear pabellón';
    }

    public function description(): ?string
    {
        return 'Blog edit pabellón';
    }

    public function commandBar(): iterable
    {
        return [
            Button::make('Crear nuevo')
                ->icon('database-add')
                ->method('save')
                ->class('btn btn-dark')
                ->canSee(!$this->pavilion->exists),

            Button::make('Actualizar')
                ->icon('bs.check-circle')
                ->method('save')
                ->class('btn btn-warning')
                ->canSee($this->pavilion->exists),

            Button::make('Eliminar')
                ->icon('trash')
                ->method('remove')
                ->class('btn btn-danger')
                ->canSee($this->pavilion->exists),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('pavilion.name')
                    ->title('Nombre del pabellón')
                    ->placeholder('Título atractivo pero misterioso')
                    ->help('Especifica un título descriptivo corto para este pabellón.')
                    ->required(),

                TextArea::make('pavilion.description')
                    ->title('Descripción')
                    ->rows(5)
                    ->required(),
            ]),
        ];
    }

    public function save(Pavilion $pavilion, Request $request)
    {
        $request->validate([
            'pavilion.name' => ['required', 'min:10'],
            'pavilion.description' => ['required'],
        ]);

        $pavilion->fill($request->get('pavilion'))->save();

        Alert::info($pavilion->exists ? 'Pabellón actualizado correctamente.' : 'Pabellón creado correctamente.');
        return redirect()->route('platform.pavilions');
    }

    public function remove(Pavilion $pavilion)
    {
        $pavilion->delete();
        Alert::info('Has eliminado un pabellón con éxito');
        return redirect()->route('platform.pavilions');
    }
}