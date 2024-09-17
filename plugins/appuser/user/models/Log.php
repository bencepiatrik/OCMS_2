<?php

namespace AppUser\User\Models;

use Model;

class Log extends Model
{
    // ...
    protected $table = 'appuser_user_logs';
    protected $fillable = ['user_id', 'action'];
    public $timestamps = true;

    public $belongsTo = [
        'user' => User::class,
    ];

    public function user(): \October\Rain\Database\Relations\BelongsTo
    {
        // REVIEW - Relation by ti mal fungovať aj bez tohto, stačí $belongsTo ktoré máš vyššie. Pravdepodobne túto funkciu za teba volá OctoberCMS keď zadefinuješ $belongsTo
        return $this->belongsTo(User::class, 'user_id');
    }
}
