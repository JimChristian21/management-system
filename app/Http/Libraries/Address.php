<?php

namespace App\Http\Libraries;

use App\Http\Models\Address as AddressModel;

class Address {

    public function create($params) {

        AddressModel::create([
            'person_id' => $params->person_id,
            'street' => $params->street ?? NULL,
            'barangay' => $params->barangay ?? NULL,
            'city' => $params->city,
            'province' => $params->province,
            'zip_code' => $params->zip_code ?? NULL
        ]);
    }
}