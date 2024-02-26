window.addEventListener("load", function() {
    const butaoLimpar = document.getElementById("btnLimpar");
    butaoLimpar.onclick = function () {
        limparCampos();
    }
})

function limparCampos() {
    location.reload();
    document.getElementById("userCadast").focus();
}