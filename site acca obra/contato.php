<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

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
        $mail->addAddress('acca.construcao@gmail.com'); // E-mail de destino

        // Conteúdo do E-mail
        $mail->isHTML(true);
        $mail->Subject = 'Mensagem do site';
        $mail->Body = "<h3>Mensagem de: $nome</h3><p>$mensagem</p><p><strong>Contato:</strong> $email</p>";

        $mail->send();
        echo 'E-mail enviado com sucesso.';
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
}
$mail->SMTPDebug = 2; // ou 3 para depuração completa

?>