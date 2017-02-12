<?php
  require "koneksi.php";
?>

<?php
  try{
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $STH = $DBH->prepare("DELETE FROM mahasiswa WHERE npm = :npm");

    $npm = "06.2016.1.06628";

    $STH -> bindParam(':npm', $npm);
    $STH -> execute();

    if ($STH){
    echo "<br>Database berhasil Dihapus";
    }

    }
  catch(PDOException $STH){
      echo "<br>".$STH->getMessage();
    }
?>
