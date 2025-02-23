<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Requisição POST aceita!";
} else {
    echo "Erro: Requisição não permitida!";
}
?>


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Captura os dados do formulário
$nome = $_POST['name'];
$email = $_POST['email'];
$whatsapp = $_POST['whatsapp'];
$valor = $_POST['valor'];
$parcelas = $_POST['parcelas'];

// Configuração do PHPMailer
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP (exemplo: Gmail)
    $mail->SMTPAuth   = true;
    $mail->Username   = 'seuemail@gmail.com'; // Seu e-mail
    $mail->Password   = 'suasenha'; // Senha ou senha de aplicativo do Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configuração do e-mail
    $mail->setFrom('seuemail@gmail.com', 'FacilEmpréstimos');
    $mail->addAddress('seuemail@gmail.com'); // Para quem será enviado

    $mail->isHTML(true);
    $mail->Subject = 'Novo Pedido de Empréstimo';
    $mail->Body    = "
        <h2>Novo Pedido de Empréstimo</h2>
        <p><b>Nome:</b> $nome</p>
        <p><b>E-mail:</b> $email</p>
        <p><b>WhatsApp:</b> $whatsapp</p>
        <p><b>Valor do Empréstimo:</b> R$$valor</p>
        <p><b>Parcelas:</b> $parcelas vezes</p>
    ";

    $mail->send();
    echo "E-mail enviado com sucesso!";
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}
?>
