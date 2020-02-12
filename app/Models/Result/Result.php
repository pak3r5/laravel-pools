<?php

namespace App\Models\Result;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Class Result
 * @package App\Models\Result
 * @version February 12, 2020, 5:29 am UTC
 *
 * @property \App\Models\Result\Match match
 * @property \App\Models\Result\Team team
 * @property string type
 * @property integer team_id
 * @property integer score
 * @property integer match_id
 */
class Result extends Model
{
    use SoftDeletes;

    public $table = 'results';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'type',
        'team_id',
        'score',
        'match_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'type' => 'string',
        'team_id' => 'integer',
        'score' => 'integer',
        'match_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'Local,Visitant'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function match()
    {
        return $this->belongsTo(\App\Models\Result\Match::class, 'match_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function team()
    {
        return $this->belongsTo(\App\Models\Result\Team::class, 'team_id', 'id');
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
