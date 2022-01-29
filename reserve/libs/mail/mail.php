<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$title = strip_tags($_POST['title']);
$phone = $_POST['phone'];
// $title = $_POST['title'];
// $phone = $_POST['phone'];


$pdo = new PDO('mysql:host=localhost;dbname=gejinsjm_jivica', 'gejinsjm_jivica', 'Kojzgsf123');
$sql = "INSERT INTO `jivicasite` (`title`, `phone`) VALUES ('$title', '$phone')";

$query = $pdo->prepare($sql);
$query->execute();

$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'kopterkavse@gmail.com';                     // SMTP username
    $mail->Password   = 'lift3214';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->CharSet      = 'UTF-8'; 

    //Recipients
    $mail->setFrom('kopterkavse@gmail.com', 'заявка с сайта Живиця');
    $mail->addAddress('kopterkavse@gmail.com', 'Живиця');     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML00
    $mail->Subject = $title;
    $mail->Body    = "
    <p>Клиент: <span style=\"border-bottom:1px solid #000000\"><b>$title</b></span> </p> 
    <span>Номер телефона клиента: </span> <a href=\"tel:$phone\"><b>$phone</b></a> <br>
    <span>Адрес сайта: </span> <a href=\"https://jivica.site/\"><b>https://jivica.site/</b></a>"
    ;


    $mail->send();
    $_SESSION['sent'] = 'успешно принят';
    header ("Location: /call.php");
} catch (Exception $e) {
    $_SESSION['notsent'] = 'Заказ не принят. Ошибка : {$mail->ErrorInfo}';
    header ("Location: /call.php");
   }

