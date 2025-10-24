<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Layouts\Rows;

class ProfilePasswordLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Password::make('old_password')
                ->placeholder(__('Ingresa la contraseña actual'))
                ->title(__('Contraseña actual'))
                ->help('Esta es tu contraseña actual.'),

            Password::make('password')
                ->placeholder(__('Ingresa la nueva contraseña'))
                ->title(__('Nueva contraseña')),

            Password::make('password_confirmation')
                ->placeholder(__('Confirma la nueva contraseña'))
                ->title(__('Confirmar nueva contraseña'))
                ->help('Una buena contraseña tiene al menos 15 caracteres o al menos 8 caracteres, incluyendo un número y una letra minúscula.'),
        ];

    }
}
