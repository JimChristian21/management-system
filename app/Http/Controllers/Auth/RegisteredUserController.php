<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{
    User,
    Person,
    Address,
    UserRole
};
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
            'street' => 'string|max:64',
            'barangay' => 'string|max:64',
            'city' => 'required|string|max:64',
            'province' => 'required|string|max:64',
            'zip_code' => 'required|string|max:12',
            'email' => 'required|string|lowercase|email|max:255|unique:'.Person::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {

            DB::beginTransaction();

            $person = Person::create([
                'given_name' => $request->given_name,
                'family_name' => $request->family_name,
                'gender' => $request->gender,
                'birthdate' => $request->birth_date,
                'email' => $request->email
            ]);

            $address = Address::create([
                'person_id' => $person->id,
                'street' => $request->street,
                'barangay' => $request->barangay,
                'city' => $request->city,
                'province' => $request->province,
                'zip_code' => $request->zip_code
            ]);

            $user = User::create([
                'person_id' => $person->id,
                'password' => Hash::make($request->password),
            ]);

            $user_role = UserRole::create([
                'user_id' => $user->id,
                'role_id' => 1,
            ]);

            DB::commit();
        } catch (e) {

            DB::rollBack();
        }
        
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
