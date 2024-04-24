<?php

namespace App\Repositories;

use App\Models\UsuarioController;
use App\Repositories\BaseRepository;

/**
 * Class UsuarioControllerRepository
 * @package App\Repositories
 * @version April 23, 2024, 11:44 pm UTC
*/

class UsuarioControllerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'senha',
        'login'
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
        return UsuarioController::class;
    }
}
