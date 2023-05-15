


function verificandoDuplicidadeEmail(){
    var senha = document.getElementById("senha").value
    var repSenha = document.getElementById("repSenha").value

    if(senha != repSenha){
        alert("As senhas não coincidem");
       
        return false;
    }
    return true;

}