<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Inscription');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/'],
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', Rules\Password::defaults()],
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|regex:/^[0-9]{5}(?:-[0-9]{4})?$/',
            'companyName' => 'string',
            'companyEmail' => 'required|string|email|max:255|unique:users,company_email',
            'companyPhone' => ['required', 'regex:/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/'],
            'companyWebsite' => 'string',
            'companySiret' => 'numeric|digits:14',
        ]);

        /** @var Address $address */
        $address = Address::create([
            'address' => $request->address,
            'zip' => $request->zip,
            'city' => $request->city,
            'state' => $request->state,
        ]);

        /** @var User $user */
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_name' => $request->companyName,
            'company_email' => $request->companyEmail,
            'company_phone' => $request->companyPhone,
            'company_siret' => $request->companySiret,
            'company_website' => $request->companyWebsite,
            'address_id' => $address->getKey(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
