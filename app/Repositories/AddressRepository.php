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

    public function getAddressFromUser(int $userAddressID) : Model
    {
        return $this->model->newQuery()->where('id', '=', $userAddressID)->first();
    }

    public function updateAddress(array $data, int $userAddressID) : bool
    {
        return $this->model->newQuery()->where('id', '=', $userAddressID)
                            ->update([
                                'address' => $data['address'],
                                'zip' => $data['zip'],
                                'city' => $data['city'],
                                'state' => $data['state'],
                            ]);
    }
}
