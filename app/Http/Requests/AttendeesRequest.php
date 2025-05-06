<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'attendee.nombre' => ['required', 'min:20'],
            'attendee.correoElectronico' => ['required', 'email'],
            'attendee.empresa' => ['required', 'min:10'],
            'attendee.intereses' => ['required'],
            'attendee.numeroCelular' => ['required', 'min:10'],
            'attendee.feria_id' => ['required'],
            'attendee.stand_id' => ['required'],
        ];
    }
}
