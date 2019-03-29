<?php

namespace App\Repositories;

use App\Models\Imprint;
use App\Repositories\BaseRepository;

/**
 * Class ImprintRepository
 * @package App\Repositories
 * @version March 29, 2019, 11:15 am UTC
*/

class ImprintRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'text'
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
        return Imprint::class;
    }
}
