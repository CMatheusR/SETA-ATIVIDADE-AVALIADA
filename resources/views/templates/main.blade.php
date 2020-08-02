<html>
    <head>
        <title>SETA - @yield('titulo')</title>
        <meta charset="UTF-8">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/padrao.css') }}" rel="stylesheet">
        <style>
            body {
                padding: 40px;
            }
            .navbar {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark align-content-center">
            @if($tag=="MENU")
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/home-run.svg') }}" width="30" height="30" class="d-inline-block align-bottom"
                         alt="">
                    Menu
                </a>
            @endif
            @if($tag=="CUR")
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/curso_ico.png') }}" width="30" height="30" class="d-inline-block align-bottom"
                         alt="">
                    Cursos
                </a>
            @endif
            @if($tag=="COM")
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/componente_ico.png') }}" width="30" height="30" class="d-inline-block align-bottom"
                         alt="">
                    Compontente
                </a>
            @endif
            @if($tag=="TUR")
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/turma_ico.png') }}" width="30" height="30" class="d-inline-block align-bottom"
                         alt="">
                    Turmas
                </a>
            @endif
            @if($tag=="DIS")
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/disciplina_ico.png') }}" width="30" height="30" class="d-inline-block align-bottom"
                         alt="">
                    Disciplinas
                </a>
            @endif
            <span class="navbar-brand">SETA - Sistema de Entrega de  Trabalho e Atividades</span>
            <a class="navbar-brand" href="{{route('principal.index')}}">| HOME |</a>
        </nav>
        <div>
            @yield('conteudo')
        </div>
        <hr>
    </body>
    <footer>
        <b>&copy;2020 - Claudio Matheus do Rosario.</b>
    </footer>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    @yield('script')

</html>

