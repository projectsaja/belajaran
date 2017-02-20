<?php
require "koneksi.php";
require "class.php";

$db = database::connect();
$mahasiswa = new Mahasiswa($db);

$mahasiswa->npm = $_POST['npm'];

if(!$mahasiswa->delete()){
    echo "ada error";
}
else{
    header('location: index.php');
}