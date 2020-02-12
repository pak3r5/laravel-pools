<?php

namespace App\Models\Match;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Class Match
 * @package App\Models\Match
 * @version February 12, 2020, 4:46 am UTC
 *
 * @property \App\Models\Match\Matchweek id
 * @property integer number
 * @property integer matchweek_id
 */
class Match extends Model
{
    use SoftDeletes;

    public $table = 'matches';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'number',
        'matchweek_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'number' => 'integer',
        'matchweek_id' => 'integer'
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
    public function matchweek()
    {
        return $this->belongsTo(\App\Models\Match\Matchweek::class, 'matchweek_id','id');
    }

    public function results()
    {
        return $this->hasMany(\App\Models\Team\Team::class, 'team_id','id');
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
