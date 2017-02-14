<?php 
/*$host     = "localhost";
$dbname   = "itats2";
$user     = "bagos97";
$password = "bagosep97";

try {

	$DBH = new PDO ("mysql:host=$host;dbname=$dbname", $user, $password);

	if ($DBH){
		echo "Konek Sukses";
	}
}
catch (PDOException $STH){
	echo"<br>".$STH->getMessage();
}*/

class database {
    private static $dbName = 'itats2' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'bagos97';
    private static $dbUserPassword = 'bagosep97';
    private static $DBH = null;
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$DBH )
       {    
        try
        {
          self::$DBH =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
          if (self::$DBH){
				echo "Konek Sukses";
			}
        }
        catch(PDOException $e)
        {
          die($e->getMessage());
        }
       }
       return self::$DBH;
    }
     
    public static function disconnect()
    {
        self::$DBH = null;
    }
}

?>