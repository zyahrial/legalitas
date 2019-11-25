<?php
namespace App\Http\Controllers;
use App\Legalitas;
use App\Notif;
use App\Karyawan;
use App\Peminjaman;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerController extends Controller
{ 

function mail_legalitas(Request $request){

$today = date("Y-m-d");
$cek = Legalitas::where('tgl_warning',$today)->get();
foreach($cek as $data){

if ((count($cek)) > 0){

    $notif = new Notif();
    $notif->ket = $data->nama_dok;
    $notif->email = $data->email2;
    $notif->save();

try {
$mail = new PHPMailer(true);

{
$body      =  "<html>

<head>
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>
<h3>Hallo ".$data->penanggung_jawab.",</h3>
</head>      
<i>Mohon Untuk Memperbarui Data Legalitas :</i>
<br><br>
<body>
<table >
<tr>
  <td style='color : #696969;'><strong>NAMA DOK </td><td style='background-color:#'><strong>:</strong></td><td ><strong><i>".$data->nama_dok."</i></strong></td></tr>    
    <tr>
    <td style='color : #696969;'><strong> NO.</td><td style='background-color:#'><strong>:</strong></td><td s><strong><i>".$data->no_dok."</i></strong></td></tr>
   
    <tr>
      <td style='color : #696969;'><strong> DATE WARNING </td><td ><strong>:</strong></td><td ><strong><i>".$data->tgl_warning."</i></strong></td></tr>
    
    <tr>
      <td style='color : #696969;'><strong> DATE EXPIRED </td>
      <td ><strong>:</strong></td><td ><strong><i>".$data->tgl_expired."</i></strong></td></tr>
    
    </table>
<br> <br> <br> <br> <br>

</body>
<p>This email was generated automatically. Do not reply to this email as it is not monitored.</p> 
  
<p>PT. Sucofindo Prima Internasional Konsultan | Graha Sucofindo Lt.12 Jl. Raya Pasar Minggu Kav. 34, Jakarta 12780 | Phone: (021) 7983666 | Fax: (021) 7986883 |  Fax: 7986894<p>
</html>";

$mail->isSMTP();

$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'mail.sprint.co.id';

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = true;

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

$to = $data->email2;

$mail->AddAddress($to);

//$mail->AddBCC($bcc1);

$mail->Subject = 'Pesan Peringatan';

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}



echo 'Message Has Success.';
} catch (phpmailerException $e) {
echo $e->errorMessage();

}
}else{
echo "tidak ada warning"; 
echo "'.$today.'";
}
}
}

function mail_peminjaman(Request $request){

$today = date("Y-m-d");
$query = Peminjaman::where('status', 'OPEN')->get();

foreach($query as $data){

 $tgl_pinjam = date('d-M-Y', strtotime($data->tgl_pinjam));

if ($today > $data->est_tgl_kembali){

try {
$mail = new PHPMailer(true);
{
$body ="
<head>
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>
<h3>Hallo ".$data->nama_peminjam.",</h3>
</head>
<body>
    <text><i>Mohon untuk konfirmasi pengembalian :</i></text>
<br><br>
<table>
    <tr><td style='color : #696969;'><strong>NO.INVENTARIS</td><td>".$data->no_inventaris."</strong></td></tr>
    <tr><td style='color : #696969;'><strong>MERK/TYPE</strong></td><td>".$data->merk_Type."</td></tr>
    <tr><td style='color : #696969;'><strong>JENIS BARANG</strong></td><td>".$data->jenis_barang."</td></tr>
    <tr><td style='color : #696969;'><strong>TGL.PEMINJAMAN</strong></td><td>".$tgl_pinjam."</td></tr>
</table>
<br><br><br><br><br>
</body>
<p>This email was generated automatically. Do not reply to this email as it is not monitored.</p> 
<p>PT. Sucofindo Prima Internasional Konsultan | Graha Sucofindo Lt.12 Jl. Raya Pasar Minggu Kav. 34, Jakarta 12780 | Phone: (021) 7983666 | Fax: (021) 7986883 |  Fax: 7986894<p>
</html>";

$mail->isSMTP();

$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'mail.sprint.co.id';

$mail->Port = 587;

$mail->SMTPSecure = 'auto';

$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = true;

$mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    )
); 
$mail->Username = "reminder@sprint.co.id";

$mail->Password = "q1w2e3r4";

$mail->setFrom('reminder@sprint.co.id', 'Sprint Auto Reminder');

$mail->addReplyTo('reminder@sprint.co.id', 'Sprint Auto Reminder');

$to = $data->email;

$mail->AddAddress($to);

$mail->Subject = 'Reminder Peminjaman Peralatan IT';

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}

echo 'Message Has Success.';
} catch (phpmailerException $e) {
echo $e->errorMessage();

}

}else{

echo "tidak ada warning"; 
echo "'.$today.'";
}
}
}

}