 <!-- https://material.io/resources/icons/?icon=delete&style=baseline -->

@extends('templates.main', ['titulo' => "Componente", 'tag' => "COM"])

@section('titulo') Componentes @endsection

@section('conteudo')

    <div class='row'>
        <div class='col'>
            <button class="btn btn-primary btn-block" onClick="criar()">
                <b>Cadastrar Novo Componente Curricular</b>
            </button>
        </div>
    </div>
    <br>
    <x-tablelist :header="['NOME', 'EVENTOS']" :data="$componentes" :tipo="1"></x-tablelist>

{{---------------------------------------------------------------------------}}

    <div class="modal" tabindex="-1" role="dialog" id="modalCadastrar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formComponentes">
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
                            <label><b>Carga Horária / N° Aulas - Semanal</b></label>
                            <input type="number" class="form-control" name="carga_horaria" id="carga_horaria" required>
                        </div>
                        <div class="col">
                            <label><b>Curso</b></label>
                            <select type="number" class="form-control" name="cod_curso" id="cod_curso" required></select>
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
                        <label id="carga_horaria">CARGA HORÁRIA</label>
                    </div>
                    <div class="col">
                        <label id="curso">CURSO</label>
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
            $('#modalCadastrar').modal().find('.modal-title').text("Cadastro de Componente Curricular");
            $("#id").val('');
            $("#nome").val('');
            $("#carga_horaria").val('');
            $("#cod_curso").val('');
            carregarCurso();
            $('#modalCadastrar').modal('show');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function carregarCurso(id){
            $.getJSON('/api/curso/load', function (data) {
                $('#cod_curso').html("");
                let item;
                for (let i=0; i < data.length; i++){
                    if(data[i].id == id){
                        item = '<option value="' + data[i].id + '"selected>' + data[i].nome + '</option>';
                    }else{
                        item = '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                    }
                    $('#cod_curso').append(item);
                }
            });
        }

        function carregarCursoNome(id){
            $.getJSON('/api/curso/' + id, function (data) {
                let item = "<br><b>CURSO: </b>" + data.nome;
                $('#curso').html("");
                $('#curso').append(item);
            });
        }

        $("#formComponentes").submit(function (event) {
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
            componente = {
                nome: $("#nome").val(),
                carga_horaria: $("#carga_horaria").val(),
                cod_curso: $("#cod_curso").val()
            };

            $.post("/api/componente", componente, function (data) {
                novoComponente = JSON.parse(data);
                linha = getLin(novoComponente);
                $('#tabela>tbody').append(linha);
            });
        }

        function editar(id) {
            $('#modalCadastrar').modal().find('.modal-title').text("Editar Componente Curricular");
            $.getJSON('/api/componente/'+id, function (data) {
                $('#id').val(data.id);
                $('#nome').val(data.nome);
                $('#carga_horaria').val(data.carga_horaria);
                $('#cod_curso').val(data.cod_curso);
                carregarCurso(data.cod_curso);
                $('#modalCadastrar').modal('show');
            })
        }

        function update(id) {
            componente = {
                nome: $("#nome").val(),
                carga_horaria: $("#carga_horaria").val(),
                cod_curso: $("#cod_curso").val()
            };
            $.ajax({
                type: "PUT",
                url: "/api/componente/" + id,
                context: this,
                data: componente,
                success: function (data) {
                    linhas = $("#tabela>tbody>tr");
                    e = linhas.filter(function (i, e) {
                        return e.cells[0].textContent == id;
                    });
                    if (e){
                        e[0].cells[1].textContent = componente.nome;
                    }
                },
               error: function (error) {
                    alert('ERRO - UPDATE');
                    console.log(error);
               }
            });
        }

        function visualizar(id) {
            $.getJSON('/api/componente/'+id, function (data) {
                $('#modalVisualizar').modal().find('.modal-title').text(data.nome);
                $('#modalVisualizar').modal().find('.modal-body').find('#id').html("<b>ID: </b>" + data.id);
                $('#modalVisualizar').modal().find('.modal-body').find('#carga_horaria').html("<br><b>CARGA HORÁRIA: </b>" + data.carga_horaria + " aula(s) semanais");
                carregarCursoNome(data.cod_curso);
                $('#modalVisualizar').modal('show');
            })
        }

        function remover(id, nome) {
            $('#modalRemove').modal().find('.modal-title').text("Remover Componente Curricular");
            $('#modalRemove').modal().find('.modal-body').html("");
            $('#modalRemove').modal().find('.modal-body').append("Deseja Remover o Componente Curricular '" + nome + "'?");
            $('#id_remove').val(id);
            $('#modalRemove').modal('show');
        }

        function remove() {
            let id = $('#id_remove').val();
            $.ajax({
                type: "DELETE",
                url: "/api/componente/" + id,
                context: this,
                success: function () {
                    let linhas = $("#tabela>tbody>tr");
                    let e = linhas.filter(function (i, elemento) {
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

        function getLin(componente) {
            let linha =
                "<tr style='text-align: center'>" +
                "<td>" + componente.nome + "</td>" +
                "<td>" +
                "<a nohref style='cursor:pointer' onclick='visualizar(" + componente.id + ")'><img class='small' src='{{ asset('img/icons/info.svg') }}'></a>" +
                "<a nohref style='cursor:pointer' onclick='editar(" + componente.id + ")'><img class='small' src='{{ asset('img/icons/edit.svg') }}'></a>" +
                "<a nohref style='cursor:pointer' onclick='remover(" + componente.id + ", " + componente.nome + ")'><img class='small' src='{{ asset('img/icons/delete.svg') }}'></a>" +
                "</td>" +
                "</tr>";
            return linha;
        }
    </script>
@endsection



