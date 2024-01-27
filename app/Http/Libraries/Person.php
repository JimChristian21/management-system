<?php

namespace App\Http\Libraries;

use App\Models\Person as person_model;

class Person {

    function create($params) {

        $person = person_model::create([
            'given_name' => $params->given_name,
            'family_name' => $params->family_name,
            'gender' => $params->gender,
            'birthdate' => $params->birth_date,
            'email' => $params->email,
            'phone_number' => $params->phone_number ?? NULL
        ]);

        if ($this->is_save_address($params)) {

            $person->address()->create([
                'person_id' => $person->person_id,
                'street' => $params->street ?? NULL,
                'barangay' => $params->barangay ?? NULL,
                'city' => $params->city,
                'province' => $params->province,
                'zip_code' => $params->zip_code ?? NULL
            ]);
        }
 
        return $person;
    }

    protected function is_save_address($params)
    {

        $ret = FALSE;

        !empty($params->city)
            && !empty($params->province)
            && $ret = TRUE;

        return $ret;
    }
}