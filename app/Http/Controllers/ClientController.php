<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\AddressRepository;
use App\Repositories\ClientRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ClientController extends Controller
{
    public function __construct(
        private ClientRepository $clientRepository,
        private AddressRepository $addressRepository
    ) {
    }

    public function index() : Response
    {
        $users = $this->clientRepository->listOfUsers(Auth::user());

        foreach($users as $user) {
            $user['city'] = $user->address->city;
        }

        return Inertia::render('Dashboard/Pages/Clients/Index',
            [
                'users' => $users,
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

        $address = $this->addressRepository->storeAddress($data);
        $this->clientRepository->storeUser($data, $address->getKey());

        return redirect(route('client.index'));
    }

    public function destroy(User $user) : RedirectResponse|Redirector
    {
        $this->clientRepository->deleteUser($user);
        return redirect(route('client.index'));
    }

    public function edit(User $user) : Response
    {
        return Inertia::render(
            'Dashboard/Pages/Clients/Edit',
            [
                'user' => $user,
                'address' => $this->addressRepository->getAddressFromUser($user->address_id)
            ]
        );
    }

    public function update(UpdateUserRequest $request, User $user) : RedirectResponse|Redirector
    {
        /** @var array $data */
        $data = $request->validated();

        $this->addressRepository->updateAddress($data, $user->address_id);
        $this->clientRepository->updateUser($data, $user);

        return redirect(route('client.index'));
    }
}
