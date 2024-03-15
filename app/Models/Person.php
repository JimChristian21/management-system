<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\{
    Address,
    User
};

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'given_name',
        'family_name',
        'gender',
        'birthdate',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'person_id');
    }
}
