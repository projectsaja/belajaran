<?php
require "koneksi.class.php";
require "mahasiswa.class.php";

$db = Database::connect();
$mahasiswa = new Mahasiswa($db);

$mahasiswa->id_mhs = $_POST['id_mhs'];
$mahasiswa->nama = $_POST['nama'];
$mahasiswa->alamat = $_POST['alamat'];
$mahasiswa->jurusan = $_POST['jurusan'];

if(!$mahasiswa->insert()){
    echo "ada error";
}
else{
    header('location: index.php');
}