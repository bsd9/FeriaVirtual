<?php

namespace App\Orchid\Screens;

use App\Models\Pavilion;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PavilionsEditScreen extends Screen
{
    public $pavilion;

    public function query(Pavilion $pavilion): iterable
    {
        return [
            'pavilion' => $pavilion,
        ];
    }

    public function name(): ?string
    {
        return $this->pavilion->exists ? 'Editar pabellón' : 'Crear pabellón';
    }

    public function commandBar(): iterable
    {
        return [
            Button::make('Guardar')
                ->icon('check')
                ->method('save')
                ->canSee($this->pavilion->exists),

            Button::make('Crear')
                ->icon('plus')
                ->method('save')
                ->canSee(!$this->pavilion->exists),

            Button::make('Eliminar')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->pavilion->exists),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('pavilion.name')
                    ->title('Nombre del pabellón')
                    ->placeholder('Ej: Pabellón A')
                    ->required(),

                TextArea::make('pavilion.description')
                    ->title('Descripción (opcional)')
                    ->rows(3),
            ]),
        ];
    }

    public function save(Pavilion $pavilion, Request $request)
    {
        $request->validate([
            'pavilion.name' => 'required|string|max:255',
        ]);

        $pavilion->fill($request->get('pavilion'))->save();

        Toast::info($pavilion->exists ? 'Pabellón actualizado.' : 'Pabellón creado.');
        return redirect()->route('platform.pavilions');
    }

    public function remove(Pavilion $pavilion)
    {
        $pavilion->delete();
        Toast::info('Pabellón eliminado.');
        return redirect()->route('platform.pavilions');
    }
}