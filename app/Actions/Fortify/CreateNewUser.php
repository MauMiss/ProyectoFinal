<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'direccion' => ['string'], // Agregar validación para dirección
            'telefono' => ['string'], // Agregar validación para teléfono
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Crear el usuario
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'direccion' => $input['direccion'],
            'telefono' => $input['telefono'],
            'rol' => 'USUARIO', // Conservar el campo 'rol' en la tabla 'users'
        ]);

        // Asignar el rol "USUARIO" utilizando Spatie
        $role = Role::where('name', 'USUARIO')->first();
        if ($role) {
            $user->assignRole($role);
        }

        return $user;
    }
}
