<?php
// ---------------------------------------------
// Secure Contact Form Handler — send_message.php
// ---------------------------------------------

// Allow only POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Method Not Allowed");
}

// --- SPAM PROTECTION (honeypot field) ---
if (!empty($_POST["website"])) { // Hidden field; real users leave empty
    exit("Spam detected");
}

// --- Sanitize and Validate Inputs ---
function clean_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, "UTF-8");
}

$name = clean_input($_POST["name"] ?? "");
$email = clean_input($_POST["email"] ?? "");
$message = clean_input($_POST["message"] ?? "");

// --- Server-Side Field Checks ---
if (empty($name) || empty($email) || empty($message)) {
    exit("Error: All fields are required.");
}

// --- Validate Email Format ---
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Error: Invalid email address.");
}

// --- Prevent Email Header Injection ---
if (preg_match("/[\r\n]/", $email) || preg_match("/[\r\n]/", $name)) {
    exit("Error: Invalid input detected.");
}

// --- Prepare Email ---
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

// --- Send Email ---
$sent = mail($to, $subject, $body, $headers);

// --- Output Result ---
if ($sent) {
    echo "Success: Your message has been sent!";
} else {
    echo "Error: Message delivery failed. Please try again later.";
}
?>
