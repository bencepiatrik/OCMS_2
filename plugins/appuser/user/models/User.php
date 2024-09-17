<?php namespace AppUser\User\Models;

use Hash;
use Model;

class User extends Model
{
    protected $table = 'appuser_users';

    /* REVIEW - Jedna vec je dôležitá kvôli bezpečnosti, NIKDY nedávaj citlivé údaje do fillable, je to security risk.
    V tomto projekte samozrejme až tak nie ale ak by si riešil niečo podobné na nejakom projekte tak to platí */
    protected $fillable = ['username', 'password', 'token'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value); // REVIEW - Ak hashuješ heslo, tak to radšej rob cez $hashable (pozri OCMS docs), alebo to urob v beforeSave / beforeCreate metódach (taktiež OCMS docs)
    }

    public function logs(): \October\Rain\Database\Relations\HasMany
    {
        return $this->hasMany(Log::class, 'user_id');
    }

    public $hasMany = [
        'logs' => [Log::class, 'key' => 'user_id']
    ];
}


