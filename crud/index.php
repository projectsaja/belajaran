<?php
require "koneksi.php";
require "class.php";	

$db = Database::connect();
$mahasiswa = new Mahasiswa($db);
$rows = $mahasiswa->select();
?>
 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CRUD With PDO</title>
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
          <th>Semester</th>
          <th>Umur</th>      
          <th>Edit</th>          
          <th>Hapus</th>
      </thead>
      <tbody>
        <?php
            while($row = $rows->fetchObject()) {
              echo '<tr>';
                echo  '<td>'.$row->npm.'</td> <td>'.$row->nama.'</td> <td>'.$row->semester.'</td> <td>'.$row->umur.'</td>';
                echo '<td><a class="button" href=input_update.php?npm='.$row->npm.'>edit</a></td>';
                echo '<td><a class="button" href=delete_PDO.php?npm='.$row->npm.'>delete</a></td>';
              echo '</tr>';
            }
          ?>
  </tbody>
</table>
  </body>
</html>
