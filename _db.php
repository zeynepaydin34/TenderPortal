<?php
//MySQL Veritabanı Bağlantısı Yapıldı.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sartentenderportaldb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>
