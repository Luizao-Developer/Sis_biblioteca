



function verificandoDuplicidadeEmail(){
    var senha = document.getElementById("senha").value
    var repSenha = document.getElementById("repSenha").value

    if(senha != repSenha){
        alert("As senhas não coincidem");
       
        return false;
    }
    return true;

}

// Dados a serem enviados
var data = {
    nome: 'John Doe',
    idade: 25
  };
  
  // Configurar as opções da requisição
  var options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  };
  
  // Enviar a requisição para o arquivo PHP
  fetch('arquivo.php', options)
    .then(response => response.json())
    .then(result => {
      // Lidar com a resposta do PHP
      console.log(result);
    })
    .catch(error => {
      console.error('Erro na requisição:', error);
    });
  