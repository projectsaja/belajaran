<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>INPUT INSERT PDO</title>
  </head>
  <body>
  <?php
echo '<form method="POST" action="insert_PDO.php">';
echo "<table>";
echo '<tr><td>NPM Terdaftar</td><td><input width="200px" name="npm" placeholder="Masukan NPM"></input></td></tr>';
echo '<tr><td>Nama</td><td><input width="200px" name="nama" placeholder="Masukan nama"></input></td></tr>';
echo '<tr><td>Semester</td><td><input width="200px" name="semester" placeholder="Masukan Semester"></input></td></tr>';
echo '<tr><td>Umur</td><td><input width="200px" name="umur" placeholder="Masukan umur"></input></td></tr>';
echo "</table>";
echo '<button type="submit">oke</button>';
echo "</form>";
?>
  </body>
</html>
