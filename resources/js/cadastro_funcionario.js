$(document).ready(function () {

    $('#cadastrar').click(function () {
        if ($('#nome').val() == "" || $('#email2').val() == "" || $('#senha2').val() == "" || ($('#cpf').val() == "") || ($('#nif').val() == "") || ($('#data_nascimento').val() == "") || ($('#funcionarios').val() == "")) {
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Por favor, preencha todos os campos.'
            });
            return false;
        }
        let funcionario_id = $.cookie('funcionario_id');
        let token = $.cookie('token');


        $.ajax({
            url: '../api/funcionario_cadastro',
            type: 'POST',
            data: {
                funcionario_id: $('#funcionario_id').val(),
                nome: $('#nome').val(),
                email: $('#email2').val(),
                senha: $('#senha2').val(),
                cpf: $('#cpf').val(),
                nif: $('#nif').val(),
                data_nascimento: $('#data_nascimento').val(),
                funcionarios: $('#funcionarios').val(),
                funcionario_id: funcionario_id,
                token: token
            },
            success: function (response) {
                console.log(response);
                if (response.erro == "n") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso',
                        text: 'Funcionário cadastrado com sucesso!'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: 'Erro ao cadastrar funcionário. Por favor, tente novamente.'
                    });
                }
            }
        });
    });

});