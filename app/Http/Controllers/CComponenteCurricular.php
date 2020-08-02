<?php

namespace App\Http\Controllers;

use App\Model\ComponeteCurricular;
use Illuminate\Http\Request;

class CComponenteCurricular extends Controller
{


    public function index()
    {
        $componentes = ComponeteCurricular::all();
        return view('componente.index', compact('componentes'));
    }


    public function create(){}


    public function store(Request $request)
    {
        $componentes = new ComponeteCurricular();
        $componentes->nome = $request->nome;
        $componentes->carga_horaria = $request->carga_horaria;
        $componentes->cod_curso = $request->cod_curso;
        $componentes->save();

        return json_encode($componentes);
    }


    public function show($id)
    {
        $componentes = ComponeteCurricular::find($id);
        if (isset($componentes)) {
            return json_encode($componentes);
        }
        return response('Componente Curricular não encontrado', 404);
    }


    public function edit($id){}


    public function update(Request $request, $id)
    {
        $componentes = ComponeteCurricular::find($id);
        if (isset($componentes)) {
            $componentes->nome = $request->nome;
            $componentes->carga_horaria = $request->carga_horaria;
            $componentes->cod_curso = $request->cod_curso;
            $componentes->save();
            return json_encode($componentes);
        }
        return response('Componente Curricular não encontrado', 404);
    }


    public function destroy($id)
    {
        $componentes = ComponeteCurricular::find($id);
        if (isset($componentes)) {
            $componentes->delete();
            return response('OK', 200);
        }
        return response('Componente Curricular não encontrado', 404); return response('Componente Curricular não encontrado', 404);
    }

    public function loadJson(){
        $componentes = ComponeteCurricular::all();
        return json_encode($componentes);
    }
}
