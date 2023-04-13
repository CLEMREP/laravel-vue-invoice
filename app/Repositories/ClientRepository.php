<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class ClientRepository
{
    public function __construct(private Client $model)
    {
    }

    public function listOfUsers(User $user) : LengthAwarePaginator
    {
        return $this->model->newQuery()->where('user_id', $user->getKey())->paginate(6);
    }


    public function getAllUsers(User $user) : Collection
    {
        return $this->model
            ->newQuery()
            ->where('user_id', $user->getKey())
            ->get();
    }

    public function storeClient(array $data, int $address_id, int|null $company_id) : Client
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
            'isCompany' => $data['isCompany'],
            'user_id' => $data['user_id'],
            'company_id' => $company_id,
            'address_id' => $address_id,
        ]);
    }

    public function updateClient(array $data, Client $client) : void
    {
        $client->update([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'isCompany' => $data['isCompany'],
        ]);


        if ($data['isCompany']) {
            $client->company()->update([
                'name' => $data['companyName'] ?? '',
                'email' => $data['companyEmail'] ?? '',
                'phone' => $data['companyPhone'] ?? '',
                'siret' => $data['companySiret'] ?? '',
            ]);

            $client->company->address->update([
                'address' => $data['companyAddress'] ?? '',
                'zip' => $data['companyZip'] ?? '',
                'city' => $data['companyCity'] ?? '',
                'state' => $data['companyState'] ?? '',
            ]);
        }
    }

    public function deleteClient(Client $client) : bool|null
    {
        /** @var Address $address */
        $address = $client->address;

        if ($client->isCompany) {
            $client->company->address->delete();
        }

        return $address->delete();
    }

    public function countClients(User $user) : int
    {
        return $this->model->newQuery()->where('user_id', $user->getKey())->count();
    }
}
