<?php

namespace App\Repositories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Model;

class AddressRepository
{
    public function __construct(private Address $model)
    {
    }


    public function storeAddress(array $data) : Address
    {
        return $this->model->create([
            'address' => $data['address'],
            'zip' => $data['zip'],
            'city' => $data['city'],
            'state' => $data['state'],
        ]);
    }

    public function getAddressFromClient(int $clientAddressId) : object|null
    {
        return $this->model->newQuery()->where('id', $clientAddressId)->first();
    }

    public function updateAddress(array $data, Address $address) : bool
    {
        return $address
            ->update([
                'address' => $data['address'],
                'zip' => $data['zip'],
                'city' => $data['city'],
                'state' => $data['state'],
            ]);
    }
}
