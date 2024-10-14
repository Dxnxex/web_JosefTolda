<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání dat z formuláře
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Ověření, zda jsou povinná pole vyplněná
    if (!empty($name) && !empty($email) && !empty($message)) {

        // Nastavení příjemce (tvůj email)
        $to = "toldadaniel@gmail.com";

        // Nastavení předmětu
        $subject = "Nová zpráva z kontaktního formuláře";

        // Obsah emailu
        $emailContent = "Jméno: $name\n";
        $emailContent .= "Email: $email\n";
        $emailContent .= "Telefon: $phone\n";
        $emailContent .= "Zpráva:\n$message\n";

        // Nastavení hlaviček emailu
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Odeslání emailu pomocí funkce mail()
        if (mail($to, $subject, $emailContent, $headers)) {
            echo "Zpráva byla úspěšně odeslána!";
        } else {
            echo "Chyba při odesílání zprávy.";
        }
    } else {
        echo "Vyplňte prosím všechna povinná pole.";
    }
}
?>