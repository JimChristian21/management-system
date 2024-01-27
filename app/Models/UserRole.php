<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\{
    User,
    Role
};

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'user_roles';

    protected $fillable = [
        'user_id',
        'role_id'
    ];

    public $timestamps = FALSE;

    public function user():BelongsTo 
    {
        
        return $this->belongsTo(User::class, 'user_id');
    }

    public function role():BelongsTo 
    {
        
        return $this->belongsTo(Role::class, 'role_id');
    }
}
