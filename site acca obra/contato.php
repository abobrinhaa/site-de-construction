<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carrega o autoloader do PHPMailer
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $destinatario = "accaconstrução@gmail.com"; // E-mail que receberá as mensagens
    $assunto = "Mensagem do site"; // Assunto padrão para os e-mails
    $mensagem = isset($_POST["mensagem"]) ? $_POST["mensagem"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP do Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'acca.construcao@gmail.com'; // Seu e-mail do Gmail
        $mail->Password = 'acca130487'; // Senha do seu e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remetente e Destinatário
        $mail->setFrom($email, $nome);
        $mail->addAddress($destinatario);

        // Conteúdo do E-mail
        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $mail->Body = "<h3>Mensagem de: $nome</h3><p>$mensagem</p><p><strong>Contato:</strong> $email</p>";

        // Enviar e-mail
        $mail->send();
        $mensagemEnviada = true;
    } catch (Exception $e) {
        $mensagemEnviada = false;
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}

if (isset($mensagemEnviada)) {
    if ($mensagemEnviada) {
        echo "<p id='success-message' class='success-message'>E-mail enviado com sucesso.</p>";
    } else {
        echo "<p id='error-message'>Ocorreu um erro ao enviar o e-mail.</p>";
    }
}
?>
