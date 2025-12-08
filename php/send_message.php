<?php
// ---------------------------------------------------
// Secure Contact Form Handler
// ---------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Method Not Allowed");
}

// --- Honeypot Anti-Spam ---
if (!empty($_POST["website"])) {
    exit("Spam detected");
}

// --- Sanitization Function ---
function clean_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, "UTF-8");
}

// --- Sanitize Fields ---
$name = clean_input($_POST["name"] ?? "");
$email = clean_input($_POST["email"] ?? "");
$message = clean_input($_POST["message"] ?? "");

// --- Required Fields Check ---
if (empty($name) || empty($email) || empty($message)) {
    exit("Error: All fields are required.");
}

// --- Validate Email ---
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Error: Invalid email address.");
}

// --- Prevent Header Injection ---
if (preg_match("/[\r\n]/", $email) || preg_match("/[\r\n]/", $name)) {
    exit("Error: Invalid characters detected.");
}

// --- Email Setup ---
$to = "folusho.morafa@gmail.com";
$subject = "New Contact Form Message from $name";

$body = "You received a new message from your website contact form:\n\n"
      . "Name: $name\n"
      . "Email: $email\n\n"
      . "Message:\n$message\n\n"
      . "------------------------------\n"
      . "Sent from fmorafa.com";

$headers = "From: noreply@fmorafa.com\r\n";
$headers .= "Reply-To: $email\r\n";

// --- Attempt to Send Email ---
$sent = mail($to, $subject, $body, $headers);

// --- Redirect to Thank-You Page ---
if ($sent) {
    header("Location: /thank-you.html");
    exit();
} else {
    exit("Error: Message delivery failed. Please try again later.");
}
?>
