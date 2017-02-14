<?php
require "koneksi.php";
require "class.php";	

$db = database::connect();
$mahasiswa = new Mahasiswa($db);

if (isset($_POST['insert'])){
	
	$mahasiswa -> insert();
}

   /* if (isset($_POST['insert'])){
		try {

			$DBH -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$STH = $DBH ->prepare ("INSERT INTO mahasiswa(npm, nama, semester, umur) values (?, ?, ?, ?)");

			$npm = $_POST["npm"];
			$nama = $_POST["nama"];
			$semester = $_POST["semester"];
			$umur = $_POST["umur"];

			$STH -> bindParam (1, $npm);
			$STH -> bindParam (2, $nama);
			$STH -> bindParam (3, $semester);
			$STH -> bindParam (4, $umur);
			$STH -> execute();

			if($STH){
				echo "<br> Database Berhasil ditambah";
			}
			$DBH = null;
			}
			catch(PDOException $STH){
				echo "<br>".$STH->getMessage();
			}
	}

	if (isset($_POST['update'])){
	try {

	$DBH -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$STH = $DBH ->prepare ("UPDATE mahasiswa set  nama = :nama, semester = :semester, umur=:umur where npm = :npm ");

	$npm = $_POST["npm"];
	$nama = $_POST["nama"];
	$semester = $_POST["semester"];
	$umur = $_POST["umur"];

	$STH -> bindParam (':npm', $npm);
	$STH -> bindParam (':nama', $nama);
	$STH -> bindParam (':semester', $semester);
	$STH -> bindParam (':umur', $umur);
	$STH -> execute();

			if($STH){
			echo "<br> Database Berhasil diupdate";
			}
			}
			catch(PDOException $STH){
				echo "<br>".$STH->getMessage();
			}

	}

	if (isset($_POST['delete'])){
		try {

		$DBH -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$STH = $DBH ->prepare ("DELETE FROM mahasiswa where npm=:npm");

		$npm =$_POST["npm"];

		$STH -> bindParam (':npm', $npm);
		$STH -> execute();

		if($STH){
			echo "<br> Database Berhasil didelete";
			}
			$DBH = null;
		}
		catch(PDOException $STH){
			echo "<br>".$STH->getMessage();
		}
	}
	*/
 ?>
 
<html>
<head>
    <meta charset="utf-8">
    <title>Input Insert Update Delete PDO</title>
<body>
	<h1 align="center">Input Insert Update Delete With PDO</h1>
    <form method="POST" action="#">
    <table align="center" border="1px">
    <tr>
        <td>NPM</td><td><input width="200px" name="npm" placeholder = " Masukan NPM "></input>
        <input type=submit name=cari value=cari></td>
    </tr>
    <tr>
        <td>Nama</td><td><input width="200px" name="nama" placeholder = " Masukan Nama "></input></td>
    </tr>
    <tr>
        <td>Semester</td><td><input width="200px" name="semester" placeholder = " Masukan Semester "></input></td>
    </tr>
    <tr>
        <td>Umur</td><td><input width="200px" name="umur" placeholder = " Masukan Umur "></input></td>
    </tr>
    <tr><td align=right colspan=3><input type=submit name=insert value=insert><input type=submit name=update value=update>
    <input type=submit name=delete value=delete></td></tr>
    </table>
    </form>
  <?php
  if (isset($_POST['cari'])){
	try {
 		  $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
   		  $STH = $DBH->prepare("SELECT * FROM mahasiswa WHERE npm = :npm");
  		  $npm = $_POST["npm"];
 		  $STH -> bindParam(':npm', $npm);
 		  $STH -> execute();
 	  if ($row = $STH->fetch()) {
 	     echo "<center>NPM = ".$row[0]."<br></center>";
  	     echo "<center>NAMA = ".$row[1]."<br></center>";
   	     echo "<center>semester = ".$row[2]."<br></center>";
    	 echo "<center>umur = ".$row[3]."<br></center>";
    	 echo "<br><br>";
 	  }
 	 
 	 else{
 	 	echo "<center>data tidak ada</center>";
 	 }
   // hapus koneksi
 		  $dbh = null;
	}
	catch (PDOException $e) {
   // tampilkan pesan kesalahan jika koneksi gagal
 	  print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
 	  die();
		}
	}
  ?>
</body>
</head>
</html>