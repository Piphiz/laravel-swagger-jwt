<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Return formated response
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator object with the errors
     * @throws \Illuminate\Https\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator): array
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'erros' => $validator->errors()
        ], 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ];
    }

    /**
     * Get the error messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nome e obrigatorio!',
            'name.max' => 'Nome tem o tamanho maximo de 255 caracteres',
            'email.required' => 'Email e obrigatorio',
            'email.max' => 'Email tem o tamanho maximo de 255 caracteres',
            'email.email' => 'Email nao e valido',
            'email.unique' => 'Email ja cadastrado',
            'password.required' => 'Senha e obrigatorio',
            'password.min' => 'Senha tem de ter no minimo 8 caracteres',
        ];
    }
}
