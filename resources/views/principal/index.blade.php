@extends('templates.main', ['titulo' => "Principal", 'tag' => "MENU"])

@section('titulo') Principal @endsection


@section('conteudo')

    <div class='row justify-content-around text-center'>
        <div class='col justify-content-center'>
            <a class="navbar-brand" href="{{route('curso.index')}}">
            <img src="{{ asset('img/curso_ico.png') }}">
            <div class="w-100"></div>
            <b>Curso</b></a>

        </div>
        <div class='col'>
            <a class="navbar-brand" href="{{route('componente.index')}}">
            <img src="{{ asset('img/componente_ico.png') }}">
            <div class="w-100"></div>
            <b>Componente</b></a>
        </div>
        <div class='col'>
            <a class="navbar-brand" href="{{route('turma.index')}}">
            <img src="{{ asset('img/turma_ico.png') }}">
            <div class="w-100"></div>
            <b>Turma</b></a>
        </div>
        <div class='col'>
            <a class="navbar-brand" href="{{route('disciplina.index')}}">
            <img src="{{ asset('img/disciplina_ico.png') }}">
            <div class="w-100"></div>
            <b>Disciplina</b></a>
        </div>
    </div>


@endsection


