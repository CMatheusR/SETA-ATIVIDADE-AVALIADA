<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplina extends Model
{
    use SoftDeletes;

//    protected $fillable = [
//        'id', 'nome', 'num_bimestres', 'created_at', 'updated-at', 'deleted_at', 'cod_comp_cur', 'cod_turma',
//    ];
//
//    Protected $table = "disciplinas";
}
