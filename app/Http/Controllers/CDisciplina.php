<?php

namespace App\Http\Controllers;

use App\Model\Disciplina;
use Illuminate\Http\Request;

class CDisciplina extends Controller
{

    public function index()
    {
        $disciplinas = Disciplina::all();
        return view('disciplina.index', compact('disciplinas'));
    }

    public function create(){}

    public function store(Request $request)
    {
        $disciplinas = new Disciplina();
        $disciplinas->nome = $request->nome;
        $disciplinas->num_bimestres = $request->num_bimestres;
        $disciplinas->cod_comp_cur = $request->cod_comp_cur;
        $disciplinas->cod_turma = $request->cod_turma;
        $disciplinas->save();

        return json_encode($disciplinas);
    }

    public function show($id)
    {
        $disciplinas = Disciplina::find($id);
        if (isset($disciplinas)) {
            return json_encode($disciplinas);
        }
        return response('Disciplina não encontrada', 404);
    }

    public function edit($id){}

    public function update(Request $request, $id)
    {
        $disciplinas = Disciplina::find($id);
        if (isset($disciplinas)) {
            if(isset($request->nome)){$disciplinas->nome = $request->nome;}
            if(isset($request->num_bimestres)){$disciplinas->num_bimestres = $request->num_bimestres;}
            if(isset($request->cod_comp_cur)){$disciplinas->cod_comp_cur = $request->cod_comp_cur;}
            if(isset($request->cod_turma)){$disciplinas->cod_turma = $request->cod_turma;}
            if(isset($request->peso_trabalho)){$disciplinas->peso_trabalho = $request->peso_trabalho;}
            if(isset($request->peso_avaliacao)){$disciplinas->peso_avaliacao = $request->peso_avaliacao;}
            if(isset($request->peso_prim_bim)){$disciplinas->peso_prim_bim = $request->peso_prim_bim;}
            if(isset($request->peso_seg_bim)){$disciplinas->peso_seg_bim = $request->peso_seg_bim;}
            if(isset($request->peso_ter_bim)){$disciplinas->peso_ter_bim = $request->peso_ter_bim;}
            if(isset($request->peso_quar_bim)){$disciplinas->peso_quar_bim = $request->peso_quar_bim;}
            if(isset($request->conceito_a)){$disciplinas->conceito_a = $request->conceito_a;}
            if(isset($request->conceito_b)){$disciplinas->conceito_b = $request->conceito_b;}
            if(isset($request->conceito_c)){$disciplinas->conceito_c = $request->conceito_c;}
            $disciplinas->save();
            return json_encode($disciplinas);
        }
        return response('Disciplina não encontrada', 404);
    }



    public function destroy($id)
    {
        $disciplinas = Disciplina::find($id);
        if (isset($disciplinas)) {
            $disciplinas->delete();
            return response('OK', 200);
        }
        return response('Disciplina não encontrada', 404); return response('Componente Curricular não encontrado', 404);
    }

    public function loadJson(){
        $disciplinas = Disciplina::all();
        return json_encode($disciplinas);
    }
}
