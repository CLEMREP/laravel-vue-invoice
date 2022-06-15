<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/'],
            'email' => 'required|string|email|max:255',
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|regex:/^[0-9]{5}(?:-[0-9]{4})?$/',
            'companyName' => 'required|string',
            'companyEmail' => 'required|string|email|max:255',
            'companyPhone' => ['required', 'regex:/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/'],
            'companyWeb' => 'required|string',
            'companySiret' => 'required|numeric|digits:14',
            'admin' => 'bool',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'companyName.required' => 'Vous devez insérer un nom de société',
            'companyName.string' => 'Le nom de la société doit être une chaine de caractère',
            'companyWeb.string' => 'Le site de la société doit être une chaine de caractère',
            'companyWeb.required' => 'Vous devez insérer un site de société',
            'companySiret.numeric' => 'Le siret de la société doit être un nombre',
            'companySiret.required' => 'Vous devez insérer le SIRET de la société',
            'companyPhone.required' => 'Vous devez insérer un téléphone de société',
            'companyEmail.unique' => 'L\'e-mail de société est déjà existante.',
            'companyEmail.required' => 'Vous devez insérer une e-mail de société',
            'companyEmail.email' => 'L\'e-mail doit être au bon format',
            'city.required' => 'Vous devez insérer une ville',
            'state.required' => 'Vous devez insérer un pays',
            'address.required' => 'Vous devez insérer une adresse',
            'zip.required' => 'Vous devez insérer un code postal',
            'zip.regex' => 'Le code postal doit être au bon format',
            'firstname.required' => 'Vous devez insérer un prénom.',
            'lastname.required' => 'Vous devez insérer un nom.',
            'phone.required' => 'Vous devez insérer un téléphone',
            'email.unique' => 'L\'e-mail est déjà existante.',
            'email.required' => 'Vous dever insérer une e-mail',
            'email.email' => 'L\'e-mail doit être au bon format',
            'password.required' => 'Vous devez insérer un mot de passe',
            'password.confirmed' => 'Les mots de passes doivent être similaires.',
            'password_confirmation.required' => 'Vous devez confirmer le mot de passe',
            'password.min' => 'Le mot de passe doit faire minimum :min charactères'
        ];
    }
}
