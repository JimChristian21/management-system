<?php

namespace App\Http\Libraries;

use App\Http\Models\Person as personModel;

class Person {

    function create($params) {

        $person = personModel::create([
            'given_name' => $params->given_name,
            'family_name' => $params->family_name,
            'gender' => $params->gender,
            'birthdate' => $params->birth_date,
            'email' => $params->email,
            'phone_number' => $params->phone_number ?? NULL
        ]);

        return $person;
    }
}