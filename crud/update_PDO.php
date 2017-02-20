<?php
require "koneksi.php";
require "class.php";

$db = database::connect();
$mahasiswa = new Mahasiswa($db);

$mahasiswa->npm = $_POST['npm'];
$mahasiswa->nama = $_POST['nama'];
$mahasiswa->alamat = $_POST['alamat'];
$mahasiswa->jurusan = $_POST['jurusan'];

if(!$mahasiswa->update()){
    echo "ada error";
}
else{
    header('location: index.php');
}