<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_name',
        'user_email',
        'user_phone',
        'user_password',
        'user_role'=>'Member',
        'user_status'=>'Active',
    ];

    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];

    public function getRoleAttribute()
    {
        $roleMapping = [
            '1' => 'Admin',
            '2' => 'Moderator',
            '3' => 'Member',
        ];

        return $roleMapping[$this->attributes['user_role']] ?? 'Unknown';
    }

    public function getStatusAttribute()
    {
        $statusMapping = [
            'A' => 'Active',
            'B' => 'Banned',
            'I' => 'Inactive',
        ];

        return $statusMapping[$this->attributes['user_status']] ?? 'Unknown';
    }
}