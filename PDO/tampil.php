<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tampilin Data</title>
  </head>
  <body>
  <?php
    require "koneksi.php";
    echo '<table border="1">';
    echo '<tr>  <td>NPM</td>  <td>Nama</td> <td>Semester</td> <td>Umur</td> </tr>';
    echo '<tr>  <td>aku</td>  <td>nama</td> <td>3</td>        <td>20</td>   </tr>';
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $STH = $DBH->prepare("SELECT * FROM mahasiswa");
    $STH -> execute();
    while($row = $STH->fetch()) {
      echo '<tr> <td> '.$row[0].'</td> <td>'.$row[1].'</td> <td>'.$row[2].'</td> <td>'.$row[3].'</td> </tr>';
    }
    echo '</table>';
?>
  </body>
</html>
