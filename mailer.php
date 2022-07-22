<?php
// メール受信
$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = '
$mail->Password = '
$mail->SMTPSecure = 'tls';
$mail->From = '
$mail->FromName = '
$mail->AddAddress('
$mail->Subject = '
$mail->Body = '
$mail->Send();
?>
