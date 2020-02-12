<?php

namespace App\Models\Team;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Class Team
 * @package App\Models\Team
 * @version February 9, 2020, 5:38 am UTC
 *
 * @property \App\Models\Team\League id
 * @property integer league_id
 * @property string name
 */
class Team extends Model
{
    use SoftDeletes;

    public $table = 'teams';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'league_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'league_id' => 'integer',
        'name' => 'string',
        'uuid' => 'uuid'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function league()
    {
        return $this->belongsTo(\App\Models\League\League::class, 'league_id', 'id');
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
