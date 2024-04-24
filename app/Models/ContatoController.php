<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ContatoController
 * @package App\Models
 * @version April 24, 2024, 7:42 am UTC
 *
 * @property string $nome
 * @property string $cpf
 * @property string $telefone
 * @property string $cep
 * @property string $endereco
 * @property string $complemento
 * @property string $latitude
 * @property string $longitude
 */
class ContatoController extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'contatos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id';

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'cpf' => 'string',
        'telefone' => 'string',
        'cep' => 'string',
        'endereco' => 'string',
        'complemento' => 'string',
        'latitude' => 'string',
        'longitude' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|string|max:100',
        'cpf' => 'nullable|string|max:20',
        'telefone' => 'nullable|string|max:100',
        'cep' => 'required|string|max:100',
        'endereco' => 'nullable|string|max:100',
        'complemento' => 'nullable|string|max:100',
        'latitude' => 'nullable|string|max:50',
        'longitude' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'deleted_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
