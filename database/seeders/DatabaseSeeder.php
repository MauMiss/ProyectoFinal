<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'VETERINARIO']);
        Role::create(['name' => 'ADMINISTRADOR']);
        Role::create(['name' => 'USUARIO']);

        $user = User::create([
            'id' => 1,
            'name' => 'ADMINISTRADOR',
            'email' => 'admin@gmail.com',
            'email_verified_at' => null,
            'password' => Hash::make('password'), // Puedes cambiar 'password' por la contraseña deseada
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
            'remember_token' => null,
            'current_team_id' => null,
            'profile_photo_path' => null,
            'direccion' => 'Default',
            'telefono' => 'Default',
            'rol' => 'ADMINISTRADOR',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

// Obtener el rol 'ADMINISTRADOR' (asegúrate de que este rol ya esté creado en la tabla de roles)
        $adminRole = Role::where('name', 'ADMINISTRADOR')->first();

// Asignar el rol al usuario
        $user->assignRole($adminRole);


    }
}
