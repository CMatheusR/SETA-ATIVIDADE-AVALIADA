<?php

namespace App\Http\Controllers;

use App\Model\Curso;
use Illuminate\Http\Request;

class CCurso extends Controller
{

    public function index()
    {
        $cursos = Curso::all();
        return view('curso.index', compact('cursos'));
    }

    public function create(){}

    public function store(Request $request)
    {
        $cursos = new Curso();
        $cursos->nome = $request->nome;
        $cursos->abreviatura = $request->abreviatura;
        $cursos->tempo = $request->tempo;
        $cursos->save();

        return json_encode($cursos);
    }

    public function show($id)
    {
        $cursos = Curso::find($id);
        if (isset($cursos)) {
            return json_encode($cursos);
        }
        return response('Curso não encontrado', 404);
    }

    public function edit($id){}

    public function update(Request $request, $id)
    {
        $cursos = Curso::find($id);
        if (isset($cursos)) {
            $cursos->nome = $request->nome;
            $cursos->abreviatura = $request->abreviatura;
            $cursos->tempo = $request->tempo;
            $cursos->save();
            return json_encode($cursos);
        }
        return response('Curso não encontrado', 404);
    }

    public function destroy($id)
    {
        $cursos = Curso::find($id);
        if (isset($cursos)) {
            $cursos->delete();
            return response('OK', 200);
        }
        return response('Curso não encontrado', 404);
    }

    public function loadJson(){
        $cursos = Curso::all();
        return json_encode($cursos);
    }
}
