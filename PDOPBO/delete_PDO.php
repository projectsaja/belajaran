<?php
require "koneksi.class.php";
require "mahasiswa.class.php";

$db = Database::connect();
$mahasiswa = new Mahasiswa($db);

$mahasiswa->id_mhs = $_GET['id_mhs'];

if(!$mahasiswa->delete()){
    echo "ada error";
}
else{
    header('location: index.php');
}