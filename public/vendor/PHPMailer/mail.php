<?php
date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';
require_once('koneksi_mail.php');
$today = date("d-m-Y")/time("hh:mm");

if ($cek>0){

try {
$mail = new PHPMailer(true);
$body      =  "<html>

<head><h3>Sistem membaca anda mengaktifkan auto warning untuk tanggal ".$row['tgl_warning']."
</h3><h4><i>Silahkan lakukan pembaruan dengan link http://192.168.0.40/inventaris/proyek/proyek.php<i></h4></head>
<body>
<table align='left' cellpadding='3' border='0'  cellspacing='3'  style='font-family:Roboto; font-size:12px'>
<td colspan='3' align='center' style='background-color:#0D17FF; color: white;'><strong>Notice</strong><td>   
<tr>
  <td style='background-color:#4ED9E8' ><strong>DOK </td><td style='background-color:#'><strong>:</strong></td><td style='background-color:#D3FFEA'><strong><i>".$row['nama_dok']."</i></strong></td></tr>
    
    <tr>
      <td style='background-color:#4ED9E8' ><strong> NO. DOK</td><td style='background-color:#'><strong>:</strong></td><td style='background-color:#D3FFEA'><strong><i>".$row['no_dok']."</i></strong></td></tr>
   
    <tr>
      <td style='background-color:#4ED9E8' ><strong> DATE WARNING </td><td style='background-color:#'><strong>:</strong></td><td style='background-color:#D3FFEA'><strong><i>".$row['tgl_warning']."</i></strong></td></tr>
    
    <tr>
      <td style='background-color:#4ED9E8' ><strong> DATE EXPIRED </td>
      <td style='background-color:#'><strong>:</strong></td><td style='background-color:#D3FFEA'><strong><i>".$row['tgl_expired']."</i></strong></td></tr>
	
	</table>
<br> <br> <br> <br> <br> <br> <br> <hr> 

</body>
<p>This email was generated automatically. Do not reply to this email as it is not monitored.</p> 
  
<p>PT. Sucofindo Prima Internasional Konsultan | Graha Sucofindo Lt.12 Jl. Raya Pasar Minggu Kav. 34, Jakarta 12780 | Phone: (021) 7983666 | Fax: (021) 7986883 |  Fax: 7986894<p>
</html>";

$mail->isSMTP();

$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'mail.sprint.co.id';

$mail->Port = 25;

$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false;

$mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    )
); 
$mail->Username = "warning_server@sprint.co.id";

$mail->Password = "q1w2e3r4";

$mail->setFrom('warning_server@sprint.co.id', 'Sprint Server');

$mail->addReplyTo('warning_server@sprint.co.id', 'Sprint Server');

$to = $row['email1'];
$bcc1 = ($row['email2']);

$mail->AddAddress($to);

$mail->AddBCC($bcc1);

$mail->Subject = 'warning from server';

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

echo 'Message Has Success.';
} catch (phpmailerException $e) {
echo $e->errorMessage();

}

}

else {

echo "tidak ada warning"; 

}
?>