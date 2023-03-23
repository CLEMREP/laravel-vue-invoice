<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::insert([
            'address' => '63 Boulevard du Tertre',
            'city' => 'Nantes',
            'zip' => '44100',
            'state' => 'France',
        ]);

        User::insert([
            'firstname' => 'Clément',
            'lastname' => 'REPEL',
            'email' => 'contact@clement-repel.fr',
            'phone' => '07 61 38 20 25',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'admin' => true,
            'company_name' => 'Binary-Cloud',
            'company_email' => 'contact@clement-repel.fr',
            'company_phone' => '07 61 38 20 28',
            'company_siret' => '90468726600018',
            'company_website' => 'clement-repel.fr',
            'address_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //User::factory(10)->create();
    }
}
