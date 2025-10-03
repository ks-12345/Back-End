<?php

class Email {
    public function enviar() {
        return "Enviando email...";
    }
}

class Sms {
    public function enviar() {
        return "Enviando SMS...";
    }
}

function notificar($meio) {
    if (method_exists($meio, 'enviar')) {
        echo $meio->enviar() . PHP_EOL;
    } else {
        echo "Objeto inválido para notificação." . PHP_EOL;
    }
}

// Teste interativo
echo "Escolha o meio de notificação (Email, Sms): ";
$notificacao = trim(fgets(STDIN));

if ($notificacao == "Email") {
    $email = new Email();
    notificar($email);
} elseif ($notificacao == "sms") {
    $sms = new Sms();
    notificar($sms);
} else {
    echo "Meio de notificação inválido!" . PHP_EOL;
}
?>