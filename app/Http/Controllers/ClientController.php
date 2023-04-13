<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use App\Repositories\AddressRepository;
use App\Repositories\ClientRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ClientController extends Controller
{
    public function __construct(
        private ClientRepository $clientRepository,
        private AddressRepository $addressRepository,
        private CompanyRepository $companyRepository,
    ) {
    }

    public function index() : Response
    {
        /** @var User $connectedUser */
        $connectedUser = Auth::user();
        $clients = $this->clientRepository->listOfUsers($connectedUser);

        foreach($clients as $client) {
            $client['city'] = $client->address->city;
        }

        return Inertia::render('Dashboard/Pages/Clients/Index',
            [
                'clients' => $clients,
            ]);
    }

    public function create() : Response
    {
        return Inertia::render('Dashboard/Pages/Clients/Create');
    }

    public function store(StoreUserRequest $request) : RedirectResponse|Redirector
    {
        /** @var array $data */
        $data = $request->validated();
        $data['user_id'] = Auth::user()->getKey();

        $address = $this->addressRepository->storeAddress($data);
        if ($data['isCompany']) {
            $company = $this->companyRepository->storeCompany($data, $address->getKey());
        }
        $this->clientRepository->storeClient($data, $address->getKey(), $company?->getKey() ?? null);

        return redirect(route('client.index'));
    }

    public function destroy(Client $client) : RedirectResponse|Redirector
    {
        $this->clientRepository->deleteClient($client);
        return redirect(route('client.index'));
    }

    public function edit(Client $client) : Response
    {
        /** @var Company|null $company */
        $company = $this->companyRepository->getCompanyFromClient($client->company_id);

        return Inertia::render(
            'Dashboard/Pages/Clients/Edit',
            [
                'client' => $client,
                'address' => $this->addressRepository->getAddressFromClient($client->address_id),
                'company' => $company,
                'companyAddress' => $company?->address ?? null,
            ]
        );
    }

    public function update(UpdateUserRequest $request, Client $client) : RedirectResponse|Redirector
    {
        /** @var array $data */
        $data = $request->validated();

        $this->addressRepository->updateAddress($data, $client->address);
        $this->clientRepository->updateClient($data, $client);

        return redirect(route('client.index'));
    }
}
