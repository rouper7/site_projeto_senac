<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_completo'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $to = 'seu-email@exemplo.com';
    $subject = 'Nova mensagem de contato';
    $message = "Nome: $nome\n\nE-mail: $email\n\nMensagem:\n$mensagem";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "<p class='text-center'>Mensagem enviada com sucesso!</p>";
    } else {
        echo "<p class='text-center'>Erro ao enviar mensagem. Tente novamente mais tarde.</p>";
    }
}
?>
