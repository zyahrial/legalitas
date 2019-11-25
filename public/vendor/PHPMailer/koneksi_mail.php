<?php
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . "inventaris/koneksi.php";

 
$todayDate = date("Y-m-d");
$result = mysqli_query($con, "SELECT nama_dok,no_dok,tgl_warning,tgl_expired,email1,email2 FROM perizinan WHERE tgl_warning='$todayDate' ORDER BY kode ASC"); 

$row = mysqli_fetch_array($result);
$cek = mysqli_num_rows($result);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan con ke Database : '.mysqli_connect_error();
}else{
	echo $todayDate;
}
?>