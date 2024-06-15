<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $cidade = htmlspecialchars($_POST['cidade']);
    $estado = htmlspecialchars($_POST['estado']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Configurações do email
    $to = "seuemail@dominio.com"; // Substitua pelo seu email
    $subject = "Novo contato do formulário";
    $body = "Nome: $nome\n".
            "Cidade: $cidade\n".
            "Estado: $estado\n".
            "Telefone: $telefone\n".
            "Mensagem:\n$mensagem";

    $headers = "From: noreply@dominio.com" . "\r\n" .
               "Reply-To: noreply@dominio.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
        echo "
        <div class='container mt-5'>
            <div class='alert alert-success' role='alert'>
                Obrigado, $nome. Recebemos sua mensagem e entraremos em contato em breve.
            </div>
        </div>
        ";
    } else {
        echo "
        <div class='container mt-5'>
            <div class='alert alert-danger' role='alert'>
                Houve um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde.
            </div>
        </div>
        ";
    }
} else {
    echo "
    <div class='container mt-5'>
        <div class='alert alert-danger' role='alert'>
            Método de requisição inválido.
        </div>
    </div>
    ";
}
?>
