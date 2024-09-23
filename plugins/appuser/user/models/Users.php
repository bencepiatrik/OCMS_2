<?php namespace AppUser\User\Models;

use Model;
use \October\Rain\Database\Traits\Hashable;


/**
 * Users Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Users extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = true;
    protected $hashable = ['password'];

    protected $guarded = ['password', 'token'];

    protected $fillable = ['username'];

    /**
     * @var string table name
     */
    public $table = 'appuser_users';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $hasMany = [
        'logs_old' => [Logs::class, 'key' => 'user_id']
    ];
}
