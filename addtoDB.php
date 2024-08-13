<?php
$kullanici="root";
$sifre="";
$sunucu="localhost";
$database="sartentenderportaldb" ;

$baglan= mysql_connect($sunucu,$kullanici,$sifre);
mysql_query("SET NAMES UTF8");

if (!$baglan)
{
echo "Bağlantı Hatası".mysql_errno();
exit();
}

