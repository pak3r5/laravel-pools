<?php

namespace App\Repositories\Result;

use App\Models\Result\Result;
use App\Repositories\BaseRepository;

/**
 * Class ResultRepository
 * @package App\Repositories\Result
 * @version February 12, 2020, 5:29 am UTC
*/

class ResultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'team_id',
        'score',
        'match_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Result::class;
    }
}
