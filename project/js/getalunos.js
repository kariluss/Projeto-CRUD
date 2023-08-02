function getHtml(result) {
    let html = ``;
    html += `<div class="addnew"><button class="btn btn-primary">ADICIONAR</button></div>`;
    html += `<table class="table table-striped">`;

    for (let i = 0; i < result.length; i++) {
        if (i == 0) {
            html += `
                <thead>
                    <th>ID</th><th>Nome</th><th>Idade</th><th>Email</th>
                    <th>Curso</th><th>Semestre</th><th>Endereço</th>
                    <th></th>
                </thead> <tbody>`
            ;
        }

        let data = JSON.stringify(result[i]);

        html += `
            <tr>
                <td>${i+1}</td>
                <td>${result[i]['nome']}</td>
                <td>${result[i]['idade']}</td>
                <td>${result[i]['email']}</td>
                <td>${result[i]['curso']}</td>
                <td>${result[i]['semestre']}</td>
                <td>${result[i]['endereço']}</td>
                <td><button 
                    class="btn btn-primary btnEdit" 
                    data-id='${data}'
                >EDITAR</button></td>
                <td><button 
                    class="btn btn-danger btnDelete" 
                    data-id='${data}'
                >DELETAR</button></td>
            </tr>`
        ;
    }

    html += `</tbody></table>`;

    return html;
}

function getCursoNome(result) {
    let html = ``;
    html += `<option value="-1">Selecione um Curso</option>`;
    for(let i = 0; i < result.length; i++) {
        html += `<option value="${result[i].cursoid}">${result[i].curso}</option>`
    }

    return html;
}

function getAluno() {
    $.ajax({
        url: "/project/ajax/getalunosAJAX.php",
        type: "POST",
        dataType: "JSON",
        data: {
            action: "getalunos"
        },
        beforeSend: function() {//alert("Making ajax call");
        },
        success: function(result) {
            let html = getHtml(result);
            $("#contentdiv").html(html);
        },
        error: function() {alert("Error");}
    });
}

function getCursos() {
    $.ajax({
        url: "/project/ajax/getalunosAJAX.php",
        type: "POST",
        dataType: "JSON",
        data: {
            action: "getcursos"
        },
        beforeSend: function() {//alert("Making ajax call");
        },
        success: function(result) {
            let html = getCursoNome(result);
            $("#ddcursos").html(html);
        },
        error: function() {alert("Error");}
    });
}

function addAluno(nomex, idadex, emailx, cursox, semestrex, endx) {
    $.ajax({
        url: "/project/ajax/getalunosAJAX.php",
        type: "POST",
        dataType: "JSON",
        data: {
            nome: nomex,
            idade: idadex,
            email: emailx,
            curso: cursox,
            semestre: semestrex,
            endereco: endx,
            action: "addaluno"
        },
        beforeSend: function() {//alert("Making ajax call");
        },
        success: function(result) {
            let resp = JSON.stringify(result);
            if (resp == 0) {
                alert("Erro ao inserir");
            } else {
                alert("Inserido com sucesso");
                let html = getHtml(result);
                $("#contentdiv").html(html);
            }
        },
        error: function() {alert("Error");}
    });
}

function updateAluno(nomex, idadex, emailx, cursox, semestrex, endx, alunoidx) {
    $.ajax({
        url: "/project/ajax/getalunosAJAX.php",
        type: "POST",
        dataType: "JSON",
        data: {
            nome: nomex,
            idade: idadex,
            email: emailx,
            curso: cursox,
            semestre: semestrex,
            endereco: endx,
            alunoid: alunoidx,
            action: "updatealuno"
        },
        beforeSend: function() {//alert("Making ajax call");
        },
        success: function(result) {
            let resp = JSON.stringify(result);
            if (resp == 0) {
                alert("Erro ao atualizar");
            } else {
                alert("Atualizado com sucesso");
                let html = getHtml(result);
                $("#contentdiv").html(html);
            }
        },
        error: function() {alert("Error");}
    });
}

function removerAluno(alunoidx) {
    $.ajax({
        url: "/project/ajax/getalunosAJAX.php",
        type: "POST",
        dataType: "JSON",
        data: {
            alunoid: alunoidx,
            action: "removealuno"
        },
        beforeSend: function() {//alert("Making ajax call");
        },
        success: function(result) {
            let resp = JSON.stringify(result);
            if (resp == 0) {
                alert("Erro ao remover");
            } else {
                alert("Removido com sucesso");
                let html = getHtml(result);
                $("#contentdiv").html(html);
            }
        },
        error: function() {alert("Error");}
    });
}

$(document).ready(function(){
    // alert("Jquery loaded");
    getAluno();
    getCursos();

    $(document).on('click', '.addnew', function(){
        $("#modalal").modal('toggle');
        $("#flag").val("NEW");
    });

    $(document).on('click', '#savebnt', function(){
        let nome = $("#txtnome").val();
        let idade = $("#txtidade").val();
        let email = $("#txtemail").val();
        let curso = $("#ddcursos").val();
        let semestre = $("#ddsemestre").val();
        let end = $("#txtend").val();
        let alunoid = $("#alunoid").val();

        if (nome != '' && idade != '' && email != '' && curso >= 0 && semestre >= 0 && end != '') {
            if($("#flag").val() == "NEW") {
                addAluno(nome, idade, email, curso, semestre, end);
            } else {
                updateAluno(nome, idade, email, curso, semestre, end, alunoid);
            }
            $("#modalal").modal('hide');
        } else {
            alert("Invalid input");
        }
    });

    $(document).on('click', '.btnEdit', function(){
        $("#flag").val("EDIT");
        $("#modalal").modal('toggle');
        let data = $(this).data('id');
        //alert(JSON.stringify(data));

        $("#alunoid").val(data['alunoid'])
        $("#txtnome").val(data['nome']);
        $("#txtidade").val(data['idade']);
        $("#txtemail").val(data['email']);
        $("#ddcursos").val(data['cursoid']);
        $("#ddsemestre").val(data['semestre']);
        $("#txtend").val(data['endereço']);
    });

    $(document).on('click', '.btnDelete', function(){
        let data = $(this).data('id');
        let resp = confirm("Deseja remover o aluno " + data['nome'] + "?");
        
        if (resp == true) {
            removerAluno(data['alunoid']);
        }
        //alert("Removendo Aluno " + data['alunoid']);
    });
});