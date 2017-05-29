<?php
$host = "localhost";
$user = "root";
$pwd = "";
$db = "alumni";
$conn = @mysql_connect($host,$user,$pwd) or die("Koneksi gagal : " . mysql_error());
mysql_select_db($db);
?>