<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use DB;

use App\Models\{
    User as user_model,
};
use App\Http\Libraries\User\User;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'given_name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:12',
            'street' => 'string|max:64',
            'barangay' => 'string|max:64',
            'city' => 'required|string|max:64',
            'province' => 'required|string|max:64',
            'zip_code' => 'required|string|max:12',
            'email' => 'required|string|lowercase|email|max:255|unique:'.user_model::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $params = (object) [
            'given_name' => $request->given_name,
            'family_name' => $request->family_name,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'street' => $request->street ?? NULL,
            'barangay' => $request->barangay ?? NULL,
            'city' => $request->city,
            'province' => $request->city,
            'zip_code' => $request->zip_code ?? NULL,
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = new User();
        $newUser = $user->create($params);

        event(new Registered($newUser));

        Auth::login($newUser);

        return redirect(RouteServiceProvider::HOME);
    }
}
