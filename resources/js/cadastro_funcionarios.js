$(document).ready(function(){
    $("#cadastrar").click(function(){
        if($("#nome").val() == "" || $("#cpf").val() == "" || $("#email2").val() == "" || $("#senha2").val() == "" || $("#data_nascimento") == "" || $("#nif").val() == "" || $("#cargo").val() == "" || $("#funcionario").val() == ""){
            Swal.fire({
                icon: "error",
                title: "Erro",
                text: "Por favor preencha todos os campos!"
            });
            return false;
        }
        let funcionario_id = $.cookie('funcionario_id');
        let token = $.cookie('token');

        let file = $('#imagem')[0].files[0];
        if (file && file.size > 100000000) {
            swal.fire({
                icon: "warning",
                title:"Imagem muito grande",
                text: "a imagem deve ter no máximo 100MB"
            });
            return;
        }
        let formData = new FormData();
        if (file){
            formData.append("imagem", file);
        }
        formData.append("nome", $("#nome").val());
        formData.append("cpf", $("#cpf").val());
        formData.append("data_nascimento", $("#data_nascimento").val());
        formData.append("email", $("#email").val());
        formData.append("senha", $("#senha").val());
        formData.append("nif", $("#nif").val());
        formData.append("cargo", $("#cargo").val());
        formData.append("usuario", $("#usuario").val());
        formData.append("funcionario_id", funcionario_id);
        formData.append("token", token);

        $.ajax({
            url: "../api/salvar_funcionario",
            type: "POST",
            data: formData,
            processData: false,
            contentType:false,
            success: function(response){
                console.log(response);
                if(response.erro == "n"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso',
                        text: 'Funcionario cadastrado com sucesso!'
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: 'Erro ao cadastrar funcionário!'
                    });
                    
                }
            }
        });

    });
});