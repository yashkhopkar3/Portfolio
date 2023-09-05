<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize it
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);

    // Check if required fields are empty
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "error"; // Handle empty fields
    } else {

        // Configure email settings
        $to = "ykhopkar3@gmail.com"; 
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $messageBody = "Name: $name\n";
        $messageBody .= "Email: $email\n";
        $messageBody .= "Subject: $subject\n";
        $messageBody .= "Message:\n$message";

        // Send the email
        $mailSent = mail($to, $subject, $messageBody, $headers);

        if ($mailSent) {
            // Set a custom HTTP response header
            header('X-Portfolio-Response: Response through portfolio');

            echo "success"; // Email sent successfully
        } else {
            echo "error"; // Email sending failed
        }
    }
} else {
    // Handle non-POST requests, e.g., if someone accesses this script directly
    echo "error";
}
?>
