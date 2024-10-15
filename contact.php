<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Načti PHPMailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Vytvoř instanci PHPMailer
$mail = new PHPMailer(true);

try {
    // Nastavení SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.websupport.cz';  // SMTP server hostingu
    $mail->SMTPAuth = true;
    $mail->Username = 'email@joseftolda.cz';  // Tvůj e-mail na hostingu
    $mail->Password = 't$b?-o,,!=eT|ffx95J1'; // Zde vložte své heslo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Použijte SMTPS pro SSL
    $mail->Port = 465;  // Port pro SSL

    // Nastavení odesílatele\
    $mail->setFrom('email@joseftolda.cz', 'Daniel Tolda'); // Od koho e-mail přijde

    // Nastavení příjemce
    $mail->addAddress('email@joseftolda.cz');  // E-mail příjemce, můžeš přidat více příjemců

    // Shromáždění dat z formuláře
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

        // Nastavení kódování
        $mail->CharSet = 'UTF-8';
        
    // Validace dat
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Obsah e-mailu
        $mail->isHTML(true);  
        $mail->Subject = 'Nová zpráva z kontaktního formuláře';
        $mail->Body    = "<strong>Jméno:</strong> $name<br>
                          <strong>Email:</strong> $email<br>
                          <strong>Telefon:</strong> $phone<br>
                          <strong>Zpráva:</strong><br>$message";

        // Odeslání e-mailu
        if ($mail->send()) {
            echo 'Zpráva byla úspěšně odeslána';
        } else {
            echo "Zprávu se nepodařilo odeslat. Chyba: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Vyplňte prosím všechna povinná pole.';
    }
} catch (Exception $e) {
    echo "Zprávu se nepodařilo odeslat. Chyba: {$mail->ErrorInfo}";
}
?>
