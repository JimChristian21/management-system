<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Address;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'given_name',
        'family_name',
        'gender',
        'birthdate',
        'email'
    ];

    public function address(): HasOne 
    {
        return $this->hasOne(Address::class);
    }
}
