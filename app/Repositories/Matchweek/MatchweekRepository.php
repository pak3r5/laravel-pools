<?php

namespace App\Repositories\Matchweek;

use App\Models\Matchweek\Matchweek;
use App\Repositories\BaseRepository;

/**
 * Class MatchweekRepository
 * @package App\Repositories\Matchweek
 * @version February 12, 2020, 4:15 am UTC
*/

class MatchweekRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'start_date',
        'end_date'
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
        return Matchweek::class;
    }
}
