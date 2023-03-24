<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class ClientRepository
{
    public function __construct(private User $model)
    {
    }

    public function listOfUsers(User $user) : LengthAwarePaginator
    {
        return $this->model->newQuery()->where('id','!=', $user->getKey())->orderBy('admin', 'desc')->paginate(6);
    }


    public function getAllUsers() : Collection
    {
        return $this->model->newQuery()->get();
    }

    public function storeUser(array $data, int $address_id) : User
    {
        return $this->model->create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make(rand(12, 24)),
            'company_name' => $data['companyName'] ?? '',
            'company_email' => $data['companyEmail'] ?? '',
            'company_phone' => $data['companyPhone'] ?? '',
            'company_siret' => $data['companySiret'] ?? '',
            'company' => $data['company'],
            'admin' => $data['admin'],
            'address_id' => $address_id,
        ]);
    }

    public function updateUser(array $data, User $user) : void
    {
        $user->update([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'company_name' => $data['companyName'] ?? '',
            'company_email' => $data['companyEmail'] ?? '',
            'company_phone' => $data['companyPhone'] ?? '',
            'company_siret' => $data['companySiret'] ?? '',
            'company' => $data['company'],
            'admin' => $data['admin'],
        ]);

        if (!$data['company']) {
            $user->update([
                'company_name' => '',
                'company_email' => '',
                'company_phone' => '',
                'company_siret' => '',
            ]);
        }
    }

    public function deleteUser(User $user) : bool|null
    {
        return $user->delete();
    }

    public function countUsers() : int
    {
        return $this->model->newQuery()->count()-1;
    }
}
