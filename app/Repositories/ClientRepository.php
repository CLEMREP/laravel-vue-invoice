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

    public function listOfUsers() : LengthAwarePaginator
    {
        return $this->model->newQuery()->orderBy('admin', 'desc')->paginate(6);
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
            'password' => Hash::make($data['password']),
            'company_name' => $data['companyName'],
            'company_email' => $data['companyEmail'],
            'company_phone' => $data['companyPhone'],
            'company_siret' => $data['companySiret'],
            'company_website' => $data['companyWeb'],
            'address_id' => $address_id,
            'admin' => $data['admin'],
        ]);
    }

    public function updateUser(array $data, User $user) : void
    {
        $user->update([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'company_name' => $data['companyName'],
            'company_email' => $data['companyEmail'],
            'company_phone' => $data['companyPhone'],
            'company_siret' => $data['companySiret'],
            'company_website' => $data['companyWeb'],
            'admin' => $data['admin'],
        ]);

        if (!is_null($data['password'])) {
            $user->password = Hash::make($data['password']);
            $user->save();
        }
    }

    public function deleteUser(User $user) : bool|null
    {
        return $user->delete();
    }

    public function countUsers() : int
    {
        return $this->model->newQuery()->count();
    }
}
