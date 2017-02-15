<?php

class Mahasiswa{
    private $db;
   
    public $id_mhs;
    public $nama;
    public $alamat;
    public $jurusan;

    public function __construct($db) {
        $this->db = $db;
    }
   
    public function select() {
        $query = "select a.id_mhs, a.nama,a.alamat , b.nama_jurusan jurusan from mahasiswa a inner join jurusan b on (a.id_jurusan = b.id_jurusan) order by jurusan asc";
       
        $stmt = $this->db->query($query);

        return $stmt;
    }
    
    public function getDataJurusan() {
        $query = "select * from jurusan";
       
        $stmt = $this->db->query($query);

        return $stmt;
    }
    
    public function insert() {
        $query = "INSERT INTO mahasiswa (id_mhs, nama, alamat, id_jurusan) VALUES(?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $par = array($this->id_mhs, $this->nama, $this->alamat, $this->jurusan);
        $ret = $stmt->execute($par);
        if($ret) {
            return true;
         } else {
            $errors = $stmt->errorInfo();
            echo($errors[2]);

            return false;
         }
                 
    }
    
    public function getDataMahasiswa() {
        $query = "select * from mahasiswa where id_mhs = ?";
        $stmt = $this->db->prepare($query);
        $par = array($this->id_mhs);
        $stmt->execute($par);
        
        return $stmt->fetchObject();
    }
   
    public function update() {
        $query = "update mahasiswa set nama =?, alamat=?, id_jurusan=? where id_mhs = ?";
        $stmt = $this->db->prepare($query);
        $par = array($this->nama, $this->alamat, $this->jurusan,$this->id_mhs);
        $ret = $stmt->execute($par);
        if($ret) {
            return true;
         } else {
            $errors = $stmt->errorInfo();
            echo($errors[2]);
            return false;
         }
                 
    }
   
   
    public function delete() {
        $query = "delete from mahasiswa where id_mhs =?";
        $stmt = $this->db->prepare($query);
        $par = array($this->id_mhs);
        $ret = $stmt->execute($par);
        if($stmt) {
            return true;
        } else {
            $errors = $stmt->errorInfo();
            echo($errors[2]);
            return false;
        }
    }
}