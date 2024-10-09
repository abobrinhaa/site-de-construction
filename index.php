

    


    <section class="contato">
        <h1 id="contato">CONTATO</h1>
        <div class="contato-content">
            
        <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $destinatario = "atenasystemtcc@gmail.com";
                $assunto = isset($_POST["assunto"]) ? $_POST["assunto"] : "";
                $mensagem = isset($_POST["mensagem"]) ? $_POST["mensagem"] : "";
                $email = isset($_POST["email"]) ? $_POST["email"] : "";

                $smtpHost = "smtp.gmail.com";
                $smtpPort = 587;
                $smtpUser = "atenasystemtcc@gmail.com"; 
                $smtpPassword = "atenasystemtcc27"; 

                $headers = "From: $email\r\n";
                $headers .= "Reply-To: $email\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

                $emailEnviado = mail($destinatario, $assunto, $mensagem, $headers, "-f $email");
            }
        ?>

        <div class="form-contato">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <!-- Campo Nome e Email lado a lado -->
                        <input type="text" id="email" name="email" placeholder="Seu email" required>
                        <input type="assunto" id="assunto" name="assunto" placeholder="Seu nome" required>
                <!-- Campo Comentário abaixo -->
                    <textarea id="mensagem" name="mensagem" placeholder="Comentário" required></textarea>
                
                <!-- Botão de envio -->
                    <button type="submit" class="btn-form">Enviar</button>
            </form>
        </div>

        <?php
if (isset($emailEnviado)) {
    if ($emailEnviado) {
        echo "<p id='success-message' class='success-message'>E-mail enviado com sucesso.</p>";
    } else {
        echo "<p id='error-message'>Ocorreu um erro ao enviar o e-mail.</p>";
    }
}
?>

<script>
    
    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        var errorMessage = document.getElementById('error-message');
        
        if (successMessage) {
            successMessage.style.display = 'none';
        }
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 4000); 
</script>


<script>
        window.addEventListener("scroll", function() {
            const scrollPosition = window.scrollY;

            // Defina a altura em que deseja que a mudança de cor ocorra (em pixels)
            const alturaMudancaDeCor = 200;

            const navbar = document.querySelector(".navbar");

            if (scrollPosition > alturaMudancaDeCor) {
                // Altere a cor de fundo da barra de navegação quando a página for rolada para baixo
                navbar.style.backgroundColor = "#e5eaf5"; // Nova cor de fundo
            } else {
                // Volte à cor de fundo da barra de navegação padrão
                navbar.style.backgroundColor = "transparent"; // Cor de fundo inicial
            }
        });
</script>


</html>