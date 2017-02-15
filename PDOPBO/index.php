<?php
require "koneksi.class.php";
require "mahasiswa.class.php";

$db = Database::connect();
$mahasiswa = new Mahasiswa($db);
$rows = $mahasiswa->select();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tampilin Data</title>
    <style>
    a.button {
        -webkit-appearance: button;
        -moz-appearance: button;
        appearance: button;

        text-decoration: none;
        color: initial;
    }
    </style>
  </head>
  <body>
  <a class="button" href=input_insert.php>Tambah</a>
  <table border="1">
      <thead>
          <th>NPM</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Jurusan</th>      
          <th>Edit</th>          
          <th>Hapus</th>
      </thead>
      <tbody>
        <?php
            while($row = $rows->fetchObject()) {
              echo '<tr>';
                echo '<td> '.$row->id_mhs.'</td> <td>'.$row->nama.'</td> <td>'.$row->alamat.'</td> <td>'.$row->jurusan.'</td>';
                echo '<td><a class="button" href=input_update.php?id_mhs='.$row->id_mhs.'>edit</a></td>';
                echo '<td><a class="button" href=delete_PDO.php?id_mhs='.$row->id_mhs.'>delete</a></td>';
              echo '</tr>';
            }
          ?>
  </tbody>
</table>
  </body>
</html>
