<?php

require 'lib/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;

$mail->Debugoutput = 'html';

$mail->Host = 'upescsi.in';
$mail->Port = 25;
$mail->SMTPSecure = '';
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive =true;
$mail->Username = "techcsi@upescsi.in";
$mail->Password = "upescsi123";
$mail->setFrom('csitech@upescsi.in', 'UPES-CSI');
$mail->addReplyTo('csitech@upescsi.in', 'UPES-CSI');
require 'config.php';
$que = mysql_query("SELECT * FROM BrainFreezeemail WHERE 'sent' = 0 LIMIT 30 ");

while ($row = mysql_fetch_array($que)) {
    $certno = $row[0];
    $name = $row[1];
    $email = $row[2];
    $mail->addAddress($email, $name);
    $mail->Subject = 'Brainfreeze Certificate of Participation';
    $mail->Body    = "Hey $name
    'Brainfreezer, A murder mystery event which required the participants to
investigate a case of an On-Campus murder. The investigation began on 25th of
September with the teams been given the encrypted clues placed all across the campus.
The event was received well by all the students as it was organized with great team work. It also
received exceptional appreciation from all the participants as the clues were difficult to decrypt
but at the same time made the entire event interesting.
Please Downlaod the Certificate from the below Link :
http://certification.upescsi.in
Your Certificate Number is :
    $certno";
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!".$certno."<br>";
        $sent = mysql_query("UPDATE BrainFreeze SET `sent` = '1' WHERE NAME = '".$name."'");
    }
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
}
