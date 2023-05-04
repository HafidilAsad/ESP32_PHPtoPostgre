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




//ambil data dari esp32
// $data = pg_escape_string($_GET["data"]);

// Menjalankan perintah SQL INSERT
//$result = pg_query_params($conn, "INSERT INTO datatimbangan (data) VALUES ($1)", array($data));
// Menjalankan perintah SQL INSERT
//$result = pg_query($dbconn, "INSERT INTO monitoring_daya (data) VALUES ($data)");


//-----------------------------------------------------------

//$result = pg_query ($dbconn,"INSERT INTO monitoring_daya (tegangan) VALUES ('".$_GET["data"]."')");



if(isset($_GET["data"])) {
    $tegangan = $_GET["data"]; // get tegangan value from HTTP GET
    // konfigurasi koneksi
    $host        = "localhost";
    $port        = "5432";
    $dbname      = "monitoring_listrik";
    $credentials = "user=postgres password=123456";

    //echo $tegangan;
    
    // script koneksi php postgree
    $dbconn = pg_connect("host=localhost dbname=monitoring_listrik user=postgres password=123456");

    //$sql = "INSERT INTO monitoring_daya (data) VALUES ($tegangan)";
    //$result = pg_query($dbconn, "UPDATE MONITORING_DAYA set DAYA $tegangan where ID=1");
    $sql =<<<EOF
    UPDATE MONITORING_SDB set DAYA = $tegangan where ID=1;
EOF;
 $ret = pg_query($dbconn, $sql);
 if(!$ret) {
    echo pg_last_error($db);
    exit;
 } else {
    echo "Record updated successfully\n";
 }

}else {
        echo "tegangan is not set in the HTTP request";
     }
     
?>
