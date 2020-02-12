<?php

namespace App\Repositories\League;

use App\Models\League\League;
use App\Repositories\BaseRepository;

/**
 * Class LeagueRepository
 * @package App\Repositories\League
 * @version February 9, 2020, 4:45 am UTC
*/

class LeagueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'name'
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
        return League::class;
    }
}
