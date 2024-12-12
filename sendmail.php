<?php

require_once('includes/connect.php');

///gather the form content
$name = $_POST['name'];
$email = $_POST['email'];
$services = $_POST['services'];
$message = $_POST['message'];

$errors = [];

//validate and clean these values


if(empty($name)) {
    $errors['name'] = 'Name cant be empty';
}

if(empty($services)) {
    $errors['services'] = 'Services cant be empty';
}

if(empty($message)) {
    $errors['message'] = 'Message field cant be empty';
}

if(empty($email)) {
    $errors['email'] = 'You must provide an email';
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a REAL email';
}

if(empty($errors)) {

    //insert these values as a new row in the contacts table

    $query = "INSERT INTO contact (name ,email, message, services) VALUES('$name','$email','$services','$message')";

    if(mysqli_query($connect, $query)) {

//format and send these values in an email

$to = 'okutepa15@gmail.com';
$subject = 'Message from your Portfolio site!';

$message = "You have received a new contact form submission:\n\n";
$message .= "Name: ".$name."\n";
$message .= "Email: ".$email."\n\n";
//build out rest of message body...

mail($to,$subject,$message);

header('Location: success.html');

}else{
    for($i=0; $i < count($errors); $i++) {
        echo $errors[$i].'<br>';
    }
}








}


?>