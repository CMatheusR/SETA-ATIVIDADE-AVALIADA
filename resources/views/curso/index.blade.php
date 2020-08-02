 <!-- https://material.io/resources/icons/?icon=delete&style=baseline -->

@extends('templates.main', ['titulo' => "Curso", 'tag' => "CUR"])

@section('titulo') Cursos @endsection

@section('conteudo')

    <div class='row'>
        <div class='col'>
            <button class="btn btn-primary btn-block" onClick="criar()">
                <b>Cadastrar Novo Curso</b>
            </button>
        </div>
    </div>
    <br>
    <x-tablelist :header="['NOME', 'EVENTOS']" :data="$cursos" :tipo="1"></x-tablelist>

{{---------------------------------------------------------------------------}}

    <div class="modal" tabindex="-1" role="dialog" id="modalCadastrar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formCursos">
                    <div class="modal-header">
                    <h5 class="modal-title"><b></b></h5>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="id" class="form-control">

                        <div class='col'>
                            <label><b>Nome</b></label>
                            <input type="text" class="form-control" name="nome" id="nome" required>
                        </div>
                        <div class='col'>
                            <label><b>Abreviatura</b></label>
                            <input type="text" class="form-control" name="abreviatura" id="abreviatura" required>
                        </div>
                        <div class="col">
                            <label><b>Tempo (anos)</b></label>
                            <input type="number" class="form-control" name="tempo" id="tempo" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{---------------------------------------------------------------------------}}

    <div class="modal fade" tabindex="-1" role="dialog" id="modalVisualizar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <input type="hidden" id="id_visualizar" class="form-control">
                <div class="modal-header">
                    <h5 class="modal-title"><b></b></h5>
                </div>
                <div class="modal-body">
                    <div class='col'>
                        <label id="id">ID</label>
                    </div>
                    <div class='col'>
                        <label id="abreviatura">Abreviatura</label>
                    </div>
                    <div class="col">
                        <label id="tempo">Tempo</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="cancel" class="btn btn-success" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

{{---------------------------------------------------------------------------}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modalRemove">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <input type="hidden" id="id_remove" class="form-control">
                <div class="modal-header">
                    <h5 class="modal-title"><b></b></h5>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button class="btn btn-danger" onclick="remove()" >Sim, remover!</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Não, cancelar!</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function criar() {
            $('#modalCadastrar').modal().find('.modal-title').text("Cadastro de Cursos");
            $("#id").val('');
            $("#nome").val('');
            $("#abreviatura").val('');
            $("#tempo").val('');
            $('#modalCadastrar').modal('show');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $("#formCursos").submit(function (event) {
            event.preventDefault();
            if ($("#id").val() !== ''){
                update($("#id").val());
            }
            else {
                insert();
            }
            $("#modalCadastrar").modal('hide');
        });

        function insert() {
            curso = {
                nome: $("#nome").val(),
                abreviatura: $("#abreviatura").val(),
                tempo: $("#tempo").val()
            };

            $.post("/api/curso", curso, function (data) {
                novoCurso = JSON.parse(data);
                linha = getLin(novoCurso);
                $('#tabela>tbody').append(linha);
            });
        }

        function editar(id) {
            $('#modalCadastrar').modal().find('.modal-title').text("Alterar Curso");
            $.getJSON('/api/curso/'+id, function (data) {
                $('#id').val(data.id);
                $('#nome').val(data.nome);
                $('#abreviatura').val(data.abreviatura);
                $('#tempo').val(data.tempo);
                $('#modalCadastrar').modal('show');

            })
        }

        function update(id) {
            curso = {
                nome: $("#nome").val(),
                abreviatura: $("#abreviatura").val(),
                tempo: $("#tempo").val()
            };
            $.ajax({
                type: "PUT",
                url: "/api/curso/" + id,
                context: this,
                data: curso,
                success: function (data) {
                    linhas = $("#tabela>tbody>tr");
                    e = linhas.filter(function (i, e) {
                        return e.cells[0].textContent == id;
                    });
                    if (e){
                        e[0].cells[1].textContent = curso.nome;
                    }
                },
               error: function (error) {
                    alert('ERRO - UPDATE');
                    console.log(error);
               }
            });
        }

        function visualizar(id) {
            $.getJSON('/api/curso/'+id, function (data) {
                $('#modalVisualizar').modal().find('.modal-title').text(data.nome);
                $('#modalVisualizar').modal().find('.modal-body').find('#id').html("<b>ID: </b>" + data.id);
                $('#modalVisualizar').modal().find('.modal-body').find('#abreviatura').html("<br><b>ABREVIATURA: </b>" + data.abreviatura);
                $('#modalVisualizar').modal().find('.modal-body').find('#tempo').html("<br><b>TEMPO: </b>" + data.tempo + " ano(s)");
                $('#modalVisualizar').modal('show');
            })

        }

        function remover(id, nome) {
            $('#modalRemove').modal().find('.modal-title').text("Remover Curso");
            $('#modalRemove').modal().find('.modal-body').html("");
            $('#modalRemove').modal().find('.modal-body').append("Deseja Remover o Curso '" + nome + "'?");
            $('#id_remove').val(id);
            $('#modalRemove').modal('show');
        }

        function remove() {
            var id = $('#id_remove').val();
            $.ajax({
                type: "DELETE",
                url: "/api/curso/" + id,
                context: this,
                success: function () {
                    linhas = $("#tabela>tbody>tr");
                    e = linhas.filter(function (i, elemento) {
                        return elemento.cells[0].textContent == id;
                    });
                    if(e){
                        e.remove();
                    }
                },
                error: function (error) {
                    alert('ERRO - DELETE');
                    console.log(error);
                }
            });
            $('#modalRemove').modal('hide');
        }

        function getLin(curso) {
            var linha =
            "<tr style='text-align: center'>" +
                "<td>" + curso.nome + "</td>" +
                "<td>" +
                   "<a nohref style='cursor:pointer' onclick='visualizar(" + curso.id + ")'><img class='small' src='{{ asset('img/icons/info.svg') }}'></a>" +
                    "<a nohref style='cursor:pointer' onclick='editar(" + curso.id + ")'><img class='small' src='{{ asset('img/icons/edit.svg') }}'></a>" +
                    "<a nohref style='cursor:pointer' onclick='remover(" + curso.id + ", " + curso.nome + ")'><img class='small' src='{{ asset('img/icons/delete.svg') }}'></a>" +
                "</td>" +
            "</tr>";
            return linha;
        }
    </script>
@endsection



