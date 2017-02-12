<?php
$host="localhost";
$dbname="itats";
$user="root";
$password="";
try{
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    if ($DBH){
      echo "Koneksi Sukses";
    }
}

catch(PDOException $STH){
  echo "<br>".$STH->getMessage();
}

?>
