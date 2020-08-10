<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'Ime' => 'required',
            'Adresa' => 'required',
            'Grad' => 'required',
            'Županija' => 'required',
            'Poštanski broj' => 'required',
            'Telefon' => 'required',
        ];
    }
}
