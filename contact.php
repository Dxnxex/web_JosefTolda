<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Načti PHPMailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

require 'vendor/autoload.php';
require 'vlucas/phpdotenv';


// Vytvoř instanci PHPMailer
$mail = new PHPMailer(true);

try {

   // SMTP nastavení pomocí proměnných z .env
   $mail->isSMTP();
   $mail->Host = $_ENV['SMTP_HOST'];      
   $mail->SMTPAuth = true;
   $mail->Username = $_ENV['SMTP_USERNAME']; 
   $mail->Password = $_ENV['SMTP_PASSWORD'];
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
   $mail->Port = $_ENV['SMTP_PORT'];       

       // Nastavení odesílatele\
       $mail->setFrom('email@joseftolda.cz', 'Josef Tolda - Web');

       // Nastavení příjemce
       $mail->addAddress('email@joseftolda.cz');


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
