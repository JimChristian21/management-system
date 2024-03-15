<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $this->get_user($request->user()),
            ],
        ];
    }

    public function get_user($user)
    {

        $ret = $user;

        if ($ret && $person = $user->person) {

            $roles = $user->user_role->map(function ($user_role) {

                return $user_role->role->role;
            });

            $ret = [
                'email' => $user->email,
                'full_name' => "{$person->given_name} {$person->family_name}",
                'given_name' => $person->given_name,
                'family_name_name' => $person->family_name,
                'gender' => $person->gender,
                'birthdate' => $person->birthdate,
                'phone_number' => $person->phone_number,
                'roles' => $roles
            ];
        }

        return $ret;
    }
}
