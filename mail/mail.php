<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$title = strip_tags($_POST['title']);
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];


$pdo = new PDO('mysql:host=localhost;dbname=gejinsjm_jivica', 'gejinsjm_jivica', 'Kojzgsf123');
$sql = "INSERT INTO `jivicasite` (`title`, `phone`, `message`, `subject`) VALUES ('$title', '$phone','$message', '$subject')";

$query = $pdo->prepare($sql);
$query->execute();

$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'chelovekizzet@gmail.com';                     // SMTP username
    $mail->Password   = '0959379992';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->CharSet      = 'UTF-8'; 

    //Recipients получатели
    $mail->setFrom('imfreelancer@inbox.ru', 'заявка с сайта Freedprod');
    $mail->addAddress('imfreelancer@inbox.ru', 'Freedprod');     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML00
    $mail->Subject = $title;
    $mail->Body    = "
    <span>Адрес сайта: </span> <a href=\"https://freedprod.ru/\"><b>https://freedprod.ru/</b></a>
    <p>Клиент: <span style=\"border-bottom:1px solid #000000\"><b>$title</b></span> </p> 
    <br>
    <span>Email клиента: </span> <a href=\"mailto:$email\"><b>$email</b></a> <br>
    <p>Тема сообщения: <span style=\"border-bottom:1px solid #000000\"><b>$subject</b></span> </p> 
    <br>
    <p>Текст сообщения: <span style=\"border-bottom:1px solid #000000\"><b>$message</b></span> </p> 
    <br>"
    ;
 
    
    
    
    
    

    $mail->send();
    $_SESSION['sent'] = 'успешно принят';
    header ("Location: /contacts.html");
} catch (Exception $e) {
    header ("Location: /contacts.html");
   }

