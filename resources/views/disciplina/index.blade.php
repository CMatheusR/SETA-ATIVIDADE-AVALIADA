 <!-- https://material.io/resources/icons/?icon=delete&style=baseline -->

@extends('templates.main', ['titulo' => "Disciplina", 'tag' => "DIS"])

@section('titulo') Disciplinas @endsection

@section('conteudo')

    <div class='row'>
        <div class='col'>
            <button class="btn btn-primary btn-block" onClick="criar()">
                <b>Cadastrar Nova Disciplina</b>
            </button>
        </div>
    </div>
    <br>
    <x-tablelist :header="['NOME', 'EVENTOS']" :data="$disciplinas" :tipo="2"></x-tablelist>

{{---------------------------------------------------------------------------}}

    <div class="modal" tabindex="-1" role="dialog" id="modalCadastrar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formDisciplinas">
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
                            <label><b>Números de Bimestres</b></label>
                            <input type="number" class="form-control" name="num_bimestres" id="num_bimestres" required>
                        </div>
                        <div class="col">
                            <label><b>Componente Curricular</b></label>
                            <select type="number" class="form-control" name="cod_comp_cur" id="cod_comp_cur" required></select>
                        </div>
                        <div class="col">
                            <label><b>Turma</b></label>
                            <select type="number" class="form-control" name="cod_turma" id="cod_turma" required></select>
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
                            <label id="bimestre">BIMESTRES</label>
                    </div>
                    <div class='col'>
                            <label id="componente_curricular">COMPONENTE CURSSICULAR</label>
                    </div>
                    <div class="col">
                            <label id="turma">TURMA</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="cancel" class="btn btn-success" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

{{---------------------------------------------------------------------------}}

    <div class="modal" tabindex="-1" role="dialog" id="modalPeso">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formPeso">
                    <div class="modal-header">
                        <h5 class="modal-title"><b></b></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class='col'>
                            <label><b>Trabalho</b></label>
                            <input class="form-control" name="peso_trabalho" id="peso_trabalho" required>
                        </div>
                        <div class='col'>
                            <label><b>Avaliação</b></label>
                            <input class="form-control" name="peso_avaliacao" id="peso_avaliacao" required>
                        </div>
                        <div class='col'>
                            <label><b>1° Bimestre</b></label>
                            <input class="form-control" name="peso_prim_bim" id="peso_prim_bim" required>
                        </div>
                        <div class='col'>
                            <label><b>2° Bimestre</b></label>
                            <input class="form-control" name="peso_seg_bim" id="peso_seg_bim" required>
                        </div>
                        <div class='col'>
                            <label><b>3° Bimestre</b></label>
                            <input class="form-control" name="peso_ter_bim" id="peso_ter_bim" required>
                        </div>
                        <div class='col'>
                            <label><b>4° Bimestre</b></label>
                            <input class="form-control" name="peso_quar_bim" id="peso_quar_bim" required>
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

    <div class="modal" tabindex="-1" role="dialog" id="modalConceito">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formConceito">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class='col'>
                            <label><b>A</b></label>
                            <input class="form-control" name="conceito_a" id="conceito_a" required>
                        </div>
                        <div class='col'>
                            <label><b>B</b></label>
                            <input class="form-control" name="conceito_b" id="conceito_b" required>
                        </div>
                        <div class='col'>
                            <label><b>C</b></label>
                            <input class="form-control" name="conceito_c" id="conceito_c" required>
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
            $('#modalCadastrar').modal().find('.modal-title').text("Cadastro de Disciplina");
            $("#id").val('');
            $("#nome").val('');
            $("#num_bimestres").val('');
            $("#cod_comp_cur").val('');
            $("#cod_turma").val('');
            carregarComponenteCurricular()
            carregarTurma();
            $('#modalCadastrar').modal('show');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function carregarComponenteCurricular(id){
            $.getJSON('/api/componente/load', function (data) {
                $('#cod_comp_cur').html("");
                let item;
                for (let i=0; i < data.length; i++){
                    if(data[i].id == id){
                        item = '<option value="' + data[i].id + '"selected>' + data[i].nome + '</option>';
                    }else{
                        item = '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                    }
                    $('#cod_comp_cur').append(item);
                }
            });
        }

        function carregarComponenteCurricularNome(id){
            $.getJSON('/api/componente/' + id, function (data) {
                let item = "<br><b>COMPONENTE CURRICULAR: </b>" + data.nome;
                $('#componente_curricular').html("");
                $('#componente_curricular').append(item);
            });
        }

        function carregarTurma(id){
            $.getJSON('/api/turma/load', function (data) {
                $('#cod_turma').html("");
                let item;
                for (let i=0; i < data.length; i++){
                    if(data[i].id == id){
                        item = '<option value="' + data[i].id + '"selected>' + data[i].nome + '</option>';
                    }else{
                        item = '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                    }
                    $('#cod_turma').append(item);
                }
            });
        }

        function carregarTurmaNome(id){
            $.getJSON('/api/turma/' + id, function (data) {
                let item = "<br><b>TURMA: </b>" + data.abreviatura;
                $('#turma').html("");
                $('#turma').append(item);
            });
        }

        $("#formDisciplinas").submit(function (event) {
            event.preventDefault();
            if ($("#id").val() !== ''){
                update($("#id").val());
            }
            else {
                insert();
            }
            $("#modalCadastrar").modal('hide');
        });

        $("#formPeso").submit(function (event) {
            event.preventDefault();
            if ($("#id").val() !== ''){
                update($("#id").val());
            }
            else {
                insert();
            }
            $("#modalPeso").modal('hide');
        });

        $("#formConceito").submit(function (event) {
            event.preventDefault();
            if ($("#id").val() !== ''){
                update($("#id").val());
            }
            else {
                insert();
            }
            $("#modalConceito").modal('hide');
        });

        function insert() {
            let disciplina = {
                nome: $("#nome").val(),
                num_bimestres: $("#num_bimestres").val(),
                cod_comp_cur: $("#cod_comp_cur").val(),
                cod_turma: $("#cod_turma").val()
            };
            $.post("/api/disciplina", disciplina, function (data) {
                let novaDisciplina = JSON.parse(data);
                let linha = getLin(novaDisciplina);
                $('#tabela>tbody').append(linha);
            });
        }

        function editar(id) {
            $('#modalCadastrar').modal().find('.modal-title').text("Editar Disciplina");
            $.getJSON('/api/disciplina/'+id, function (data) {
                $('#id').val(data.id);
                $('#nome').val(data.nome);
                $('#num_bimestres').val(data.num_bimestres);
                $('#cod_comp_cur').val(data.cod_comp_cur);
                $('#cod_turma').val(data.cod_turma);
                carregarComponenteCurricular(data.cod_comp_cur);
                carregarTurma(data.cod_turma);
                $('#modalCadastrar').modal('show');
            })
        }

        function update(id) {
            let disciplina = {
                nome: $("#nome").val(),
                num_bimestres: $("#num_bimestres").val(),
                cod_comp_cur: $("#cod_comp_cur").val(),
                cod_turma: $("#cod_turma").val(),
                peso_trabalho: $("#peso_trabalho").val(),
                peso_avaliacao: $("#peso_avaliacao").val(),
                peso_prim_bim: $("#peso_prim_bim").val(),
                peso_seg_bim: $("#peso_seg_bim").val(),
                peso_ter_bim: $("#peso_ter_bim").val(),
                peso_quar_bim: $("#peso_quar_bim").val(),
                conceito_a: $("#conceito_a").val(),
                conceito_b: $("#conceito_b").val(),
                conceito_c: $("#conceito_c").val(),
            };
            $.ajax({
                type: "PUT",
                url: "/api/disciplina/" + id,
                context: this,
                data: disciplina,
                success: function (data) {
                    let linhas = $("#tabela>tbody>tr");
                    let e = linhas.filter(function (i, e) {
                        return e.cells[0].textContent == id;
                    });
                    if (e){
                        $.getJSON('/api/disciplina/'+id, function (data) {
                            e[0].cells[1].textContent = data.nome;
                        })
                    }
                },
               error: function (error) {
                    alert('ERRO - UPDATE');
                    console.log(error);
               }
            });
        }

        function visualizar(id) {
            $.getJSON('/api/disciplina/'+id, function (data) {
                $('#modalVisualizar').modal().find('.modal-title').text(data.nome);
                $('#modalVisualizar').modal().find('.modal-body').find('#id').html("<b>ID: </b>" + data.id);
                $('#modalVisualizar').modal().find('.modal-body').find('#bimestre').html("<br><b>BIMESTRE: </b>" + data.num_bimestres);
                carregarComponenteCurricularNome(data.cod_comp_cur);
                carregarTurmaNome(data.cod_turma);
                $('#modalVisualizar').modal('show');
            })
        }

        function remover(id, nome) {
            $('#modalRemove').modal().find('.modal-title').text("Remover Disciplina");
            $('#modalRemove').modal().find('.modal-body').html("");
            $('#modalRemove').modal().find('.modal-body').append("Deseja Remover a Disciplina '" + nome + "'?");
            $('#id_remove').val(id);
            $('#modalRemove').modal('show');
        }

        function remove() {
            let id = $('#id_remove').val();
            $.ajax({
                type: "DELETE",
                url: "/api/disciplina/" + id,
                context: this,
                success: function () {
                    let linhas = $("#tabela>tbody>tr");
                    let e = linhas.filter(function (i, elemento) {
                        return elemento.cells[0].textContent === id;
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

        function peso(id) {
            $.getJSON('/api/disciplina/'+id, function (data) {
                $('#modalPeso').modal().find('.modal-title').html("<b>Configuração de Pesos: </b>" + data.nome);
                $('#id').val(data.id);
                $('#peso_trabalho').val(data.peso_trabalho);
                $('#peso_avaliacao').val(data.peso_avaliacao);
                $('#peso_prim_bim').val(data.peso_prim_bim);
                $('#peso_seg_bim').val(data.peso_seg_bim);
                $('#peso_ter_bim').val(data.peso_ter_bim);
                $('#peso_quar_bim').val(data.peso_quar_bim);
                $('#modalPeso').modal('show');
            })
        }

        function conceito(id) {
            $.getJSON('/api/disciplina/'+id, function (data) {
                $('#modalConceito').modal().find('.modal-title').html("<b>Configuração de Conceitos: </b>" + data.nome);
                $('#id').val(data.id);
                $('#conceito_a').val(data.conceito_a);
                $('#conceito_b').val(data.conceito_b);
                $('#conceito_c').val(data.conceito_c);
                $('#modalConceito').modal('show');
            })
        }

        function getLin(disciplina) {
            let linha =
                "<tr style='text-align: center'>" +
                "<td>" + disciplina.nome + "</td>" +
                "<td>" +
                "<a nohref style='cursor:pointer' onclick='visualizar(" + disciplina.id + ")'><img class='small' src='{{ asset('img/icons/info.svg') }}'></a>" +
                "<a nohref style='cursor:pointer' onclick='editar(" + disciplina.id + ")'><img class='small' src='{{ asset('img/icons/edit.svg') }}'></a>" +
                "<a nohref style='cursor:pointer' onclick='remover(" + disciplina.id + ", " + disciplina.nome + ")'><img class='small' src='{{ asset('img/icons/delete.svg') }}'></a>" +
                "<a nohref style='cursor:pointer' onclick='peso("+ disciplina.id +")'><img class='small' src='{{ asset('img/icons/peso.svg') }}'></a>" +
                "<a nohref style='cursor:pointer' onclick='conceito("+ disciplina.id +")'><img class='small' src='{{ asset('img/icons/conceito.svg') }}'></a>" +
                "</td>" +
                "</tr>";
            return linha;
        }
    </script>
@endsection



