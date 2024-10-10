<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $mensagem = isset($_POST["mensagem"]) ? $_POST["mensagem"] : "";

    // Configurações do e-mail
    $destinatario = "accaconstrução@gmail.com"; // E-mail que receberá a mensagem
    $assunto = "Mensagem de Contato do Site";
    $corpoEmail = "Nome: $nome\nEmail: $email\n\nMensagem:\n$mensagem";
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envio do e-mail
    if (mail($destinatario, $assunto, $corpoEmail, $headers)) {
        // Se o e-mail for enviado, redirecione de volta para o index.html com mensagem de sucesso
        header("Location: index.html?status=sucesso");
        exit();
    } else {
        // Caso contrário, redirecione com mensagem de erro
        header("Location: index.html?status=erro");
        exit();
    }
}
?>
