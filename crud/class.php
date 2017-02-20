<?php
 
class Mahasiswa{
    private $db;
   
    public $npm;
    public $nama;
    public $semester;
    public $umur;

    public function __construct($db) {
        $this->db = $db;
    }
   
     public function select() {
        $query = "select * from mahasiswa order by npm asc";
       
        $stmt = $this->db->query($query);

        return $stmt;
    }

  public function insert() {
        $query = "INSERT INTO mahasiswa (npm, nama, semester, umur) VALUES(?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $par = array($this->npm, $this->nama, $this->semester, $this->umur);
        $ret = $stmt->execute($par);
        if($ret) {
            return true;
         } else {
            $errors = $stmt->errorInfo();
            echo($errors[2]);

            return false;
         }
                 
    }
   
   public function update() {
        $query = "update mahasiswa set nama =?, semester=?, umur=? where npm = ?";
        $stmt = $this->db->prepare($query);
        $par = array($this->nama, $this->semester, $this->umur,$this->npm);
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
        $query = "delete from mahasiswa where npm =?";
        $stmt = $this->db->prepare($query);
        $par = array($this->npm);
        $ret = $stmt->execute($par);
        if($stmt) {
            return true;
        } else {
            $errors = $stmt->errorInfo();
            echo($errors[2]);
            return false;
        }
    }

     public function getDataMahasiswa() {
        $query = "select * from mahasiswa where npm = ?";
        $stmt = $this->db->prepare($query);
        $par = array($this->npm);
        $stmt->execute($par);
        
        return $stmt->fetchObject();
    }

}