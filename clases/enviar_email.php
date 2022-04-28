<?php

//estoesta pendiente

use PHPMailer\PHPMailer\{PHPMailer,SMTP, Exception};

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //STMP::DEBUG_OFF;                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';//mail.crisramosor.com                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';//no_que_poner@ayuda.com                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);//Set email format to HTML
    $mail->Subject = 'detalles de su compra';

    $cuerpo ='<4>gracfias por su compra</h4>';
    $cuerpo = '<p>El id de su compra es<b>' . $id_transacccion . '</b></P>';


    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'le enviamos los detalles de su compra';

    $mail->setLanguage('es','..phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
} catch (Exception $e) {
    echo "error al enviar el correo electronico de la compra: {$mail->ErrorInfo}";
    exit;
}

?>