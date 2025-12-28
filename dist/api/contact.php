<?php
// public_html/api/contact.php
// Script d’API pour le formulaire de contact du site.
// Retourne toujours du JSON.

header('Content-Type: application/json; charset=utf-8');

// N'accepter que la méthode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['error' => 'Method not allowed.']);
  exit;
}

// Honeypot anti-spam (champ caché "website")
$website = $_POST['website'] ?? '';
if (!empty($website)) {
  // On ne traite pas, mais on répond OK pour le bot
  echo json_encode(['message' => 'OK']);
  exit;
}

// Récupération et nettoyage des champs
$name = strip_tags(trim($_POST['name'] ?? ''));
$email = filter_var(
  trim($_POST['email'] ?? ''),
  FILTER_VALIDATE_EMAIL
);
$message = trim($_POST['message'] ?? '');

// Validation minimale
if (!$name || !$email || !$message) {
  http_response_code(400);
  echo json_encode(['error' => 'Tous les champs sont requis.']);
  exit;
}

// Adresse de destination
$to = 'julie.michel.psy.22@gmail.com';

// Adresse d’envoi sur ton domaine
// (idéalement à créer dans cPanel)
$fromEmail = 'no-reply@julie-psy.fr';

// Sujet et corps du mail
$subject = 'Nouveau message depuis le site julie-psy.fr';
$bodyLines = [
  'Nom : ' . $name,
  'Email : ' . $email,
  '',
  'Message :',
  $message,
];
$body = implode("\n", $bodyLines);

// Headers
$headers = 'From: ' . $fromEmail . "\r\n";
$headers .= 'Reply-To: ' . $email . "\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

// Envoi avec enveloppe -f pour la délivrabilité
$success = mail($to, $subject, $body, $headers, '-f ' . $fromEmail);

if ($success) {
  echo json_encode([
    'message' => 'Votre message a bien été envoyé.',
  ]);
} else {
  http_response_code(500);
  echo json_encode([
    'error' => "Échec de l’envoi du message.",
  ]);
}
