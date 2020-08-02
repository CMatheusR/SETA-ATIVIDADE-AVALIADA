<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComponeteCurricular extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'id', 'nome', 'carga_horaria', 'created_at', 'updated-at', 'deleted_at', 'cod_curso',
    ];

    Protected $table = "componentes_curriculares";
}
