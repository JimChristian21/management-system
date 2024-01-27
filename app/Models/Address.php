<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Person;

class Address extends Model
{
    use HasFactory;

    protected $table = "addresses";

    protected $fillable = [
        'person_id',
        'street',
        'barangay',
        'city',
        'province',
        'zip_code'
    ];

    public function person(): BelongsTo
    {

        return $this->belongsTo(Person::class, 'person_id');
    }
}
