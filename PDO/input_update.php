<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>INPUT INSERT PDO</title>
  </head>
  <body>
  <?php
  require "koneksi.php";
  ?>
  <form method="get">
  <table>
  <tr><td>NPM Terdaftar</td><td><input width="200px" name="npm" placeholder="Masukan NPM"></input></td></tr>
  </table>
  <button type="submit">oke</button>
  </form>

<?php
try {
   $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
   $STH = $DBH->prepare("SELECT * FROM mahasiswa WHERE npm = :npm");
   $npm = $_GET["npm"];
   $STH -> bindParam(':npm', $npm);
   $STH -> execute();
   while($row = $STH->fetch()) {
     echo "NPM = ".$row[0]."<br>";
     echo "NAMA = ".$row[1]."<br>";
     echo "semester = ".$row[2]."<br>";
     echo "umur = ".$row[3]."<br>";
     echo "<br><br>";
   }

   // hapus koneksi
   $dbh = null;
}
catch (PDOException $e) {
   // tampilkan pesan kesalahan jika koneksi gagal
   print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
   die();
}
?>

<form method="POST" action="update_PDO.php">
<table>
<tr><td>NPM Terdaftar</td><td><input width="200px" name="npm" placeholder="Masukan NPM"></input></td></tr>
<tr><td>Nama</td><td><input width="200px" name="nama" placeholder="Masukan nama"></input></td></tr>
<tr><td>Semester</td><td><input width="200px" name="semester" placeholder="Masukan Semester"></input></td></tr>
<tr><td>Umur</td><td><input width="200px" name="umur" placeholder="Masukan umur"></input></td></tr>
</table>
<button type="submit">oke</button>
</form>
  </body>
</html>
