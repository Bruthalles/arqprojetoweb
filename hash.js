//instalar no terminal para o hash se nao tiver instalado
//  npm install bcrypt

function encryptPassword(password, callback) {
    // Gere um "salt" aleatório
    bcrypt.genSalt(10, function(err, salt) {
      if (err) {
        callback(err);
        return;
      }
  
      // Use o "salt" para criar o hash da senha
      bcrypt.hash(password, salt, function(err, hash) {
        if (err) {
          callback(err);
          return;
        }
        callback(null, hash);
      });
    });
  }
  const senha = "$senha"; // valor da variavel senha em php
  encryptPassword(senha, function(err, hash) {
    if (err) {
      console.error("Erro ao criptografar a senha: " + err);
    } else {
      // Agora, você pode enviar o valor "hash" para o PHP
      console.log("Senha criptografada: " + hash);
      // Envie o valor "hash" para o PHP (por meio de uma solicitação AJAX ou de algum outro método).
    }
  });
    