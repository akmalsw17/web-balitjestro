<?php
$tgl1 = date('Y-m-d');// pendefinisian tanggal awal
$tgl2 = date('Y-m-d', strtotime('+2 year', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
echo "Tanggal Sekarang : " .$tgl1.'<br>';
echo "Tanggal Okulasi : ".$tgl2; //print tanggal
?>