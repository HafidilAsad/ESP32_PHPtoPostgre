<?php
 
// //Variabel database
//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "db_esp2";
 
// 	$koneksi = mysqli_connect($servername, $username, $password, $dbname); // menggunakan mysqli_connect
 
// 	if(mysqli_connect_errno()){ // mengecek apakah koneksi database error
// 		echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
// 	}


// konfigurasi koneksi
// $host       =  "localhost";
// $dbuser     =  "postgres";
// $dbpass     =  "123456";
// $port       =  "5432";
// $dbname    =  "monitoring_listrik";


$host        = "localhost";
$port        = "5432";
$dbname      = "monitoring_listrik";
$credentials = "user=postgres password=123456";
// script koneksi php postgree
$dbconn = pg_connect("host=localhost dbname=monitoring_listrik user=postgres password=123456");
   
if(!$dbconn) {
   echo "Error : Unable to open database\n";
} else {
   echo "Opened database successfully\n";
}

?>
