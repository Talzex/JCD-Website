<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$telephone = $_POST['telephone'];
header('Content-Type: application/json');
if ($name === ''){
print json_encode(array('message' => 'Nom et prénom ne peuvent pas être vide', 'code' => 0));
exit();
}
if ($email === ''){
print json_encode(array('message' => 'Email ne peut pas être vide', 'code' => 0));
exit();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
print json_encode(array('message' => 'Le format de votre email est non valide.', 'code' => 0));
exit();
}
}
if ($telephone === ''){
print json_encode(array('message' => 'Téléphone ne peut pas être vide', 'code' => 0));
exit();
}
if ($message === ''){
print json_encode(array('message' => 'Message ne peut pas être vide', 'code' => 0));
exit();
}$subject = $_POST['subject'];

$content="De: $name \nEmail: $email \nMessage: $message";
$recipient = "jcd.materiaux@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Email envoyé avec succés', 'code' => 1));
exit();
?>

