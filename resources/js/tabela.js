$(document).ready(function () {

});

function deleta_funcionario(id_funcionario) {
    let funcionario_id = $.cookie('funcionario_id');
    let token = $.cookie('token');
    $.ajax({
        type: "DELETE",
        url: "/api/deletar_funcionario",
        data: {
            id_funcionario: id_funcionario,
            funcionario_id: funcionario_id,
            token: token
        },
        dataType: "json",
        success: function (response) {
            if (response.status == 'n') {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Funcionário deletado com sucesso!',
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Não foi possível deletar o funcionário. Tente novamente mais tarde.',
                });
            }
        }
    });

}