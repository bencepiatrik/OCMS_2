<?php namespace AppUser\User\Models;

use Model;

/**
 * Logs Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Logs extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = true;

    /**
     * @var string table name
     */
    public $table = 'appuser_user_logs';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    protected $fillable = [
        'user_id',
        'action',
        'created_at',
        'updated_at',
    ];

    public $belongsTo = [
        'user' => Users::class,
    ];
}
