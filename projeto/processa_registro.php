<?php

// Conecte-se ao banco de dados
$conn = mysqli_connect("localhost", "nome_do_usuario", "senha_do_usuario", "nome_do_banco_de_dados");

// Verifique a conexão
if (!$conn) {
  die("Falha na conexão: " . mysqli_connect_error());
}

// Crie a tabela de usuários
$sql = "CREATE TABLE usuarios (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome_completo VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
senha VARCHAR(50) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Tabela criada com sucesso";
} else {
  echo "Erro ao criar tabela: " . mysqli_error($conn);
}

// Obtenha os dados do formulário
if (isset($_POST["inputName"]) && isset($_POST["inputEmail"]) && isset($_POST["inputPassword"])) {
  $nome_completo = $_POST["inputName"];
  $email = $_POST["inputEmail"];
  $senha = $_POST["inputPassword"];

  // Insira os dados na tabela de usuários
  $sql = "INSERT INTO usuarios (nome_completo, email, senha)
  VALUES ('$nome_completo', '$email', '$senha')";

  if (mysqli_query($conn, $sql)) {
    echo "Dados inseridos com sucesso";
  } else {
    echo "Erro ao inserir dados: " . mysqli_error($conn);
  }
}

// Feche a conexão
mysqli_close($conn);

?>