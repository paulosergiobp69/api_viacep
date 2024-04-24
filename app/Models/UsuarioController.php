<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UsuarioController
 * @package App\Models
 * @version April 24, 2024, 8:21 am UTC
 *
 * @property string $nome
 * @property string $senha
 * @property string $login
 */
class UsuarioController extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'usuarios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id';

    public $fillable = [
        'nome',
        'senha',
        'login'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'senha' => 'string',
        'login' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'nullable|string|max:100',
        'senha' => 'nullable|string|max:100',
        'login' => 'required|string|max:50',
        'created_at' => 'nullable',
        'deleted_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
