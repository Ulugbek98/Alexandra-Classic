<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.yandex.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mamatov.far@yandex.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'far3706562'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('mamatov.far@yandex.ru'); // от кого будет уходить письмо?
$mail->addAddress('mamatov.far@yandex.ru');     // Кому будет уходить письмо 
$mail->addAddress('ulugbeck.islamov@yandex.ru');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка c Alexandra Classic';
$mail->Body    = 'Пользователь<br>' .$name." ".'оставил(а) заявку,'. '<br>Почта пользователя: ' .$email.' '.' <br>'.' Сообщение:'." " .$message;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';

} else {
    header('location: thank-you.html');
}


?>