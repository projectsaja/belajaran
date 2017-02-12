<?php
  require "koneksi.php";
?>

<?php
  try{
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $STH = $DBH->prepare("UPDATE mahasiswa set
                          nama = :nama,
                          semester = :semester,
                          umur = :umur
                          WHERE npm = :npm");

    $npm = "06.2016.1.06601";
    $nama = "Paijo";
    $semester = "7";
    $umur = "20";

    $STH -> bindParam(':npm', $npm);
    $STH -> bindParam(':nama', $nama);
    $STH -> bindParam(':semester', $semester);
    $STH -> bindParam(':umur', $umur);
    $STH -> execute();

    if ($STH){
    echo "<br>Database berhasil Diubah";
    }

    }
  catch(PDOException $STH){
      echo "<br>".$STH->getMessage();
    }
?>
