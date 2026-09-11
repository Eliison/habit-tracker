<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:60|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo de nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto válido.',
            'name.max' => 'O nome deve ter no máximo :max caracteres.',

            'email.required' => 'O campo de email é obrigatório.',
            'email.email' => 'O campo de email deve ser um endereço de email válido.',
            'email.unique' => 'Este email já está em uso.',

            'password.required' => 'O campo de senha é obrigatório.',
            'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            'password.max' => 'A senha deve ter no máximo :max caracteres.',
            'password.confirmed' => 'As senhas não coincidem.',
            'password_confirmation.required' => 'O campo de confirmação de senha é obrigatório.',
        ];
    }
}
