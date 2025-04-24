<?php
include 'includes/config.php';
header('Content-Type: application/json');

// Validate and sanitize input
$errors = [];
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

if (!$name) $errors[] = 'Name is required';
if (!$email) $errors[] = 'Valid email is required';
if (!$subject) $errors[] = 'Subject is required';
if (!$message) $errors[] = 'Message is required';

if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode('<br>', $errors)]);
    exit;
}

// Save to database
$stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    // Send email notification
    $to = 'contact@insurancecompany.com';
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from $name ($email).\n\n".
                  "Subject: $subject\n\n".
                  "Message:\n$message";
    $headers = "From: noreply@insurancecompany.com\r\nReply-To: $email";
    
    mail($to, $email_subject, $email_body, $headers);
    
    echo json_encode(['success' => true, 'message' => 'Thank you for your message! We will contact you soon.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error. Please try again later.']);
}

$stmt->close();
$conn->close();
?>