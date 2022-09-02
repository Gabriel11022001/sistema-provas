function validarFormularioDeLogin(email, senha) {
    let deixouDePreencherAlgumCampo = false;
    if (email.val() === "") {
        deixouDePreencherAlgumCampo = true;
    } else {

    }
    if (senha.val() === "") {
        deixouDePreencherAlgumCampo = true;
    } else {

    }
    return deixouDePreencherAlgumCampo;
}
function login() {
    let email = $("#email");
    let senha = $("#senha");
    if (validarFormularioDeLogin(email, senha) === false) {
        $.ajax({
            url: "/login/realizar-login",
            type: "post",
            dataType: "json",
            enctype: "utf-8",
            data: {
                email: email.val(),
                senha: senha.val()
            },
            success: function (retornoRequisicao) {
                console.log(retornoRequisicao);
            }
        });
    }
}
$("#form-login").submit(function (e) {
    e.preventDefault();
    login();
});