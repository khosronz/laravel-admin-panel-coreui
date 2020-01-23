<?php

namespace App\Repositories;

use App\Models\Severity;
use App\Repositories\BaseRepository;

/**
 * Class SeverityRepository
 * @package App\Repositories
 * @version January 23, 2020, 8:14 am +0330
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
