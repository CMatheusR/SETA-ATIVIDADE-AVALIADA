<?php

namespace App\Http\Controllers;

use App\Model\Turma;
use Illuminate\Http\Request;

class CTurma extends Controller
{


    public function index()
    {
        $turmas = Turma::all();
        return view('turma.index', compact('turmas'));
    }


    public function create(){}


    public function store(Request $request)
    {
        $turmas = new Turma();
        $turmas->nome = $request->nome;
        $turmas->ano = $request->ano;
        $turmas->abreviatura = $request->abreviatura;
        $turmas->cod_curso = $request->cod_curso;
        $turmas->save();

        return json_encode($turmas);
    }


    public function show($id)
    {
        $turmas = Turma::find($id);
        if (isset($turmas)) {
            return json_encode($turmas);
        }
        return response('Turma não encontrada', 404);
    }


    public function edit($id){}


    public function update(Request $request, $id)
    {
        $turmas = Turma::find($id);
        if (isset($turmas)) {
            $turmas->nome = $request->nome;
            $turmas->ano = $request->ano;
            $turmas->abreviatura = $request->abreviatura;
            $turmas->cod_curso = $request->cod_curso;
            $turmas->save();
            return json_encode($turmas);
        }
        return response('Turma não encontrada', 404);
    }


    public function destroy($id)
    {
        $turmas = Turma::find($id);
        if (isset($turmas)) {
            $turmas->delete();
            return response('OK', 200);
        }
        return response('Turma não encontrada', 404); return response('Componente Curricular não encontrado', 404);
    }

    public function loadJson(){
        $turmas = Turma::all();
        return json_encode($turmas);
    }
}
