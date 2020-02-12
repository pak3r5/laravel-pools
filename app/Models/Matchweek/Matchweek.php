<?php

namespace App\Models\Matchweek;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Class Matchweek
 * @package App\Models\Matchweek
 * @version February 12, 2020, 4:15 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection matches
 * @property string name
 * @property string start_date
 * @property string end_date
 */
class Matchweek extends Model
{
    use SoftDeletes;

    public $table = 'matchweeks';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'name' => 'string',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function matches()
    {
        return $this->hasMany(\App\Models\Matchweek\matches::class, 'matchweek_id', 'id');
    }

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getKeyName()
    {
        return 'uuid';
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) (string) Str::uuid();
        });
    }
}
