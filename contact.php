<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate the data
    if (!empty($name) && !empty($email) && !empty($message)) {

        // Set the recipient email address (your email)
        $to = "toldadaniel@gmail.com"; // <-- Replace with your email address

        // Set the subject
        $subject = "Nová zpráva z kontaktního formuláře";

        // Build the email content
        $emailContent = "Jméno: $name\n";
        $emailContent .= "Email: $email\n";
        $emailContent .= "Telefon: $phone\n";
        $emailContent .= "Zpráva:\n$message\n";

        // Build the email headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send the email
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
