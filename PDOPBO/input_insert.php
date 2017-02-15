<?php
require "koneksi.class.php";
require "mahasiswa.class.php";

$db = Database::connect();
$mahasiswa = new Mahasiswa($db);
$rows = $mahasiswa->getDataJurusan();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>INPUT INSERT PDO</title>
  </head>
  <body>
    <form method="POST" action="insert_PDO.php">
      <table>
        <tr>
          <td>NPM</td><td><input width="200px" name="id_mhs" placeholder="Masukan ID Mahasiswa"></input></td>
        </tr>
        <tr>
          <td>Nama</td><td><input width="200px" name="nama" placeholder="Masukan nama"></input></td>
        </tr>
        <tr>
          <td>Semester</td><td><input width="200px" name="alamat" placeholder="Masukan Alamat"></input></td>
        </tr>
        <tr>
          <td>Umur</td>
            <td>
                <select name="jurusan">
                    <?php 
                        while($row = $rows->fetchObject()) {
                            echo '<option value="'.$row->id_jurusan.'">'.$row->nama_jurusan.'</option>';
                        }
                    ?>
                </select>
            </td>
        </tr>
        </table>
      <button type="submit">oke</button>
  </form>
  </body>
</html>
