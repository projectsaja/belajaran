<?php
require "koneksi.php";
require "class.php";
$db = database::connect();
$mahasiswa = new Mahasiswa($db);
$mahasiswa->npm = $_POST['npm'];
$mhs = $mahasiswa->getDataMahasiswa();
?>

  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>INPUT Update PDO</title>
  </head>
  <body>
<form method="POST" action="update_PDO.php">
    <input type="hidden" width="200px" name="npm" value="<?php echo $mhs->npm?>">
      <table>
        <tr>
          <td>Nama</td><td><input width="200px" name="nama" placeholder="Masukan nama" value="<?php echo $mhs->nama?>"></input></td>
        </tr>
        <tr>
          <td>Semester</td><td><input width="200px" name="semester" placeholder="Masukan Semester" value="<?php echo $mhs->semester?>"></input></td>
        </tr>
        <tr>
          <td>Umur</td><td><input width="200px" name="umur" placeholder="Masukan Umur" value="<?php echo $mhs->umur?>"></input></td>
        </tr>
        </table>
      <button type="submit">oke</button>
  </form>
</body>
</html>
