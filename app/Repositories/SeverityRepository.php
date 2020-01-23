<?php

namespace App\Repositories;

use App\Models\Severity;
use App\Repositories\BaseRepository;

/**
 * Class SeverityRepository
 * @package App\Repositories
 * @version November 11, 2019, 4:47 pm +0330
*/

class SeverityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'
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
        return Severity::class;
    }
}
