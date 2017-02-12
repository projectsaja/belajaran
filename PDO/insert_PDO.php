<?php
  require "koneksi.php";
?>

<?php

try{
  $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $STH = $DBH->prepare("INSERT INTO mahasiswa(npm, nama, semester, umur) values(?, ?, ?, ?)");

  $npm = $_POST["npm"];
  $nama = $_POST["nama"];
  $semester = $_POST["semester"];
  $umur = $_POST["umur"];

  $STH -> bindParam(1, $npm);
  $STH -> bindParam(2, $nama);
  $STH -> bindParam(3, $semester);
  $STH -> bindParam(4, $umur);
  $STH -> execute();

  if ($STH){
  echo "<br>Database berhasil Ditambah";
  }
  $DBH = null;
  }
catch(PDOException $STH){
    echo "<br>".$STH->getMessage();
  }

?>
