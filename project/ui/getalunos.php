<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos, Ficha Técnica</title>
    
    <script src="/project/global/jquery.js"></script>
    <script src="/project/js/getalunos.js"></script>
    <script src="/project/global/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="/project/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="/project/css/getalunos.css">
</head>
<body>
    <main>
        <div class="heading">
            Alunos Detalhes
        </div>
        <div id="contentdiv" class="test1">

        </div>
    </main>

    <div class="modal" id="modalal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Detalhes do Aluno
                    <button class="btn btn-danger" data-bs-dismiss="modal">X</button>
                </div>
                <div class="modal-body">
                    <div class="inputelement">
                        <label>Nome</label>
                        <input id="txtnome" type="text">
                    </div>

                    <div class="inputelement">
                        <label>Idade</label>
                        <input id="txtidade" type="number">
                    </div>

                    <div class="inputelement">
                        <label>Email</label>
                        <input id="txtemail" type="text">
                    </div>

                    <div class="inputelement">
                        <label>Curso</label>
                        <select id="ddcursos">
                        </select>
                    </div>

                    <div class="inputelement">
                        <label>Semestre</label>
                        <select id="ddsemestre">
                            <option value="-1">Selecione o Semestre</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>

                    <div class="inputelement">
                        <label>Endereço</label>
                        <input id="txtend" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="savebnt">Salvar</button>
                    <button class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <hidden id="flag">
                <hidden id="alunoid">
            </div>
        </div>
    </div>
</body>
</html>