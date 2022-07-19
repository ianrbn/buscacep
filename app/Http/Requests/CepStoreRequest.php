<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CepStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => ['required', 'regex:/\A([0-9]{8})\z|\A([0-9]{5}\-[0-9]{3})\z/'],
            'state' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
        ];
    }

    /**
     * Get the validation errors messages.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'code.required' => 'O campo Código é obrigatório.',
            'code.regex' => 'O formato do Código está inválido.',

            'state.required' => 'O campo Estado é obrigatório.',
            'city.required' => 'O campo Cidade é obrigatório.',
            'district.required' => 'O campo Distrito é obrigatório.',
            'address.required' => 'O campo Endereço é obrigatório.',
        ];
    }
}
