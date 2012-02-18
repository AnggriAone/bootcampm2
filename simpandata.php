<?php

    // koneksi
    $host = "127.0.0.1";
    $user = "root";
    $password = "kediri123";
    $dbName = "dbmobile";

    $connection = mysql_connect($host, $user, $password);

    if (!$connection)
        die("connection failed");

    $connDB = mysql_select_db($dbName);

    // POST Method
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alamat = $_POST['tipe']; 

    // insert query
    $sql = "INSERT INTO mahasiswa (kode, nama, alamat)
                VALUE ('$kode', '$nama', '$alamat')";
    
    $query = mysql_query($sql);
    
    header("Location: http://localhost/bootcampm2/mobile.php");
    
    exit(1);
    
?>