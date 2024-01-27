<?php

namespace App\Http\Libraries\User;

use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\{
    User as user_model,
    UserRole
};
use App\Http\Libraries\Person;

class User {

    function create($params) {

        $ret = FALSE;
        $person = new Person();

        try {

            DB::beginTransaction();

            $person = $person->create($params);

            $user = user_model::create([
                'person_id' => $person->id,
                'password' => Hash::make($params->password),
            ]);

            $user->user_role()->create([
                'user_id' => $user->id,
                'role_id' => 1,
            ]);

            $ret = $user;

            DB::commit();
        } catch (e) {

            DB::rollBack();
        }

        return $ret;
    }
}