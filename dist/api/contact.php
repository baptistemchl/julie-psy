<?php
// public/api/contact.php
header('Content-Type: application/json');

// Honeypot anti-spam
if (!empty($_POST['website'])) {
  http_response_code(400);
  exit;
}

$name    = strip_tags(trim($_POST['name'] ?? ''));
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$message = trim($_POST['message'] ?? '');

if (!$name || !$email || !$message) {
  http_response_code(400);
  echo json_encode(['error' => 'Tous les champs sont requis.']);
  exit;
}

// Paramètres
$to      = 'contact@agence-ixp.fr';
$subject = "Nouveau message de $name";
$body    = "Nom : $name\nEmail : $email\n\nMessage :\n$message";
$headers = "From: no-reply@agence-ixp.fr\r\nReply-To: $email";

// Envoi
if (mail($to, $subject, $body, $headers)) {
  echo json_encode(['message' => 'Votre message a bien été envoyé.']);
} else {
  http_response_code(500);
  echo json_encode(['error' => 'Échec de l’envoi du message.']);
}
