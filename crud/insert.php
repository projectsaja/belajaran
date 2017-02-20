<?php
require "koneksi.php";
require "class.php";

$db = database::connect();
$mahasiswa = new Mahasiswa($db);

$mahasiswa->npm = $_POST['npm'];
$mahasiswa->nama = $_POST['nama'];
$mahasiswa->semester = $_POST['semester'];
$mahasiswa->umur = $_POST['umur'];

var_dump($_POST);

if(!$mahasiswa->insert()){
    echo "ada error";
}
else{
    header('location: index.php');
}