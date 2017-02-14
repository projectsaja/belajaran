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
    $query = "SELECT * FROM mahasiswa ORDER BY nis ASC";
       
        $stmt = $this->db->query($query);
       
        return $stmt;
    }
   
    public function insert() {
        $query = "INSERT INTO mahasiswa (npm, nama, semester, umur) VALUES(?,?,?,?)";
        $stmt = $this->db->prepare($query);
        //$this->tanggallahir = date('Y-m-d',strtotime($this->tanggallahir));
        $par = array("$this->npm", "$this->nama", "$this->semester", "$this->umur");
        $stmt->execute($par);
       // var_dump($par);
        if($stmt) {
        		echo "Data berhasil di input";
        		return true;
         } else {
                 return false;
         }
                 
    }
   
   /*
    public function update() {
        $query = "update siswa set nama =?, TANGGAL_LAHIR=?, jenis_kelamin=?, alamat=? where nis = ?";
        $stmt = $this->db->prepare($query);
        //$this->tanggallahir = date('Y-m-d',strtotime($this->tanggallahir));
        $par = array("$this->nama", "$this->tanggallahir", "$this->jeniskelamin", "$this->alamat", "$this->nis");
        $stmt->execute($par);
        var_dump($par);
        if($stmt) {
                 return true;
         } else {
                 return false;
         }
                 
    }
   
   
    public function delete() {
        $query = "delete from siswa where nis =?";
        $stmt = $this->db->prepare($query);
        $par = array("$this->nis");
        $stmt->execute($par);
        if($stmt) {
                 return true;
        } else {
                 return false;
        }
    }
   
    public function delegate(){
        $hsl = array();
        $query = "select count(1) As total from siswa ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        array_push($hsl, $result[0]["total"]);
       
        $query = "select count(1) as laki from siswa where jenis_kelamin ='Laki-laki' ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        array_push($hsl, $result[0]["laki"]);
       
        $query = "select count(1) as perempuan from siswa where jenis_kelamin='Perempuan'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        array_push($hsl, $result[0]["perempuan"]);
       
        return $hsl;
    }
   
    public function chart(){
        $stmt = $this->db->query("SELECT sum(1) jml , JENIS_KELAMIN FROM `siswa` group by JENIS_KELAMIN");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $dognut = array(
                    array("value"=> $result[0][0],"color"=> "#f56954","highlight"=> "#f56954","label"=>$result[0][1]),
                    array("value"=> $result[1][0],"color"=> "#00a65a","highlight"=> "#00a65a","label"=>$result[1][1])
                    );
        $stmt = $this->db->query("SELECT count(1) jml, year(TANGGAL_LAHIR) tahun FROM `siswa` group by year(TANGGAL_LAHIR)");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $resultYear = array();
        $resultData = array();
   
        foreach($result as $row) {
            array_push($resultYear, $row["tahun"]);
            array_push($resultData, $row["jml"]);
        }
        $chart = array();
        $chart["dognut"] = $dognut;
        $chart["barLabel"] = $resultYear;
        $chart["barData"] = $resultData;
        return $chart;
    }*/
}