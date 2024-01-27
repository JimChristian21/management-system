<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\UserRole;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['role'];

    public $timestamps = FALSE;

    public function user_role(): HasMany
    {

        return $this->hasMany(UserRole::class, 'role_id');
    }
}
