<?php namespace AppUser\User\Models;

use Hash;
use Model;

class User extends Model
{
protected $table = 'appuser_users';

protected $fillable = ['username', 'password', 'token'];

public function setPasswordAttribute($value)
{
$this->attributes['password'] = Hash::make($value);
}

public function logs(): \October\Rain\Database\Relations\HasMany
{
    return $this->hasMany(Log::class, 'user_id');
}

    public $hasMany = [
        'logs' => [Log::class, 'key' => 'user_id']
    ];
}


