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
            'address' => '88 rue Saint-Martin',
            'city' => 'Caen',
            'zip' => '14000',
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
            'company_name' => 'Web^ID',
            'company_email' => 'hello@web-id.fr',
            'company_phone' => '07 61 20 25 20',
            'company_siret' => '568 941 00056',
            'company_website' => 'web-id.fr',
            'address_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        User::factory()->count(20)->create();
    }
}
