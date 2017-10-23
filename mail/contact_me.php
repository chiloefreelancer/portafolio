<?php
// Check for empty fields
if(empty($_POST['nombre'])  		||
   empty($_POST['email']) 		||
   
   empty($_POST['mensaje'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['nombre']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));

$message = strip_tags(htmlspecialchars($_POST['mensaje']));
	
// Create the email and send the message
$to = 'wrath.wod@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Chiloé Freelancer Contacto Para:  $name";
$email_body = "Recibió un nuevo mensaje del formulario de contacto de su sitio web.\n\n"."Aquí están los detalles:\n\nNombre: $name\n\nEmail: $email_address\n\nMensaje:\n$message";
$headers = "Para: wrath.wod@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
