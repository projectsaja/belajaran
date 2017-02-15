<?php
require "koneksi.class.php";
require "mahasiswa.class.php";
$db = Database::connect();
$mahasiswa = new Mahasiswa($db);
$mahasiswa->id_mhs = $_GET['id_mhs'];
$mhs = $mahasiswa->getDataMahasiswa();
$rows = $mahasiswa->getDataJurusan();
?>

  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>INPUT INSERT PDO</title>
  </head>
  <body>
<form method="POST" action="update_PDO.php">
    <input type="hidden" width="200px" name="id_mhs" value="<?php echo $mhs->id_mhs?>">
      <table>
        <tr>
          <td>Nama</td><td><input width="200px" name="nama" placeholder="Masukan nama" value="<?php echo $mhs->nama?>"></input></td>
        </tr>
        <tr>
          <td>Semester</td><td><input width="200px" name="alamat" placeholder="Masukan Alamat" value="<?php echo $mhs->alamat?>"></input></td>
        </tr>
        <tr>
          <td>Umur</td>
            <td>
                <select name="jurusan">
                    <?php 
                        while($row = $rows->fetchObject()) {
                            if($row->id_jurusan == $mhs->id_jurusan){
                                echo '<option value="'.$row->id_jurusan.'" selected>'.$row->nama_jurusan.'</option>';
                            }
                            else{
                                echo '<option value="'.$row->id_jurusan.'">'.$row->nama_jurusan.'</option>';
                            }
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
