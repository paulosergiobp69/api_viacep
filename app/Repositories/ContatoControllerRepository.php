<?php

namespace App\Repositories;

use App\Models\ContatoController;
use App\Repositories\BaseRepository;

/**
 * Class ContatoControllerRepository
 * @package App\Repositories
 * @version April 24, 2024, 7:42 am UTC
*/

class ContatoControllerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'cpf',
        'telefone',
        'cep',
        'endereco',
        'complemento',
        'latitude',
        'longitude'
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
        return ContatoController::class;
    }
}
