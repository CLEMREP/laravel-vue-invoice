<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository
{
    public function __construct(private Company $model)
    {
    }

    public function storeCompany(array $data, int $address_id) : Company
    {
        return $this->model->create([
            'name' => $data['companyName'],
            'email' => $data['companyEmail'],
            'phone' => $data['companyPhone'],
            'siret' => $data['companySiret'],
            'address_id' => $address_id,
        ]);
    }

    public function getCompanyFromClient(int|null $clientCompanyId) : object|null
    {
        return $this->model->newQuery()->where('id', $clientCompanyId)->first();
    }
}
