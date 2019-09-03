<?php

class DB {
        
/**
* /Connection to DB
* @param type $dsn
* @param type $dbhost
* @param type $dbname
* @param type $username
* @param type $password
* @param type $PDOError
* @throws Exception
*/
// Instance of Object
        private static $instance; 

        /**
         * 
         * @var dbConnection */

        private $dbConnection = false;

        private function __construct() {

        }
    
// Defending from creation throw clone 
    
        private function __clone() {
    
        }
    
// Defending from creation throw unserialize 
    
        private function __wakeup() {
    
        }
    

        /**
         * Returns a single instance of the class
         * @return DB*/ 

        public static function getInstance() {
                if (empty(self::$instance)) {
                self::$instance = new self();
        }
                return self::$instance;
        }



        public function connect($dsn, $username, $password, $PDOError) {
                 try {
//Connecting to Database
                $this->dbConnection = new PDO($dsn, $username, $password,$PDOError);
//Getting Data from DB
                } catch (PDOExeption $e){
                        echo $e->getMessage();
                }
        }

//Link for PDO
        public function getPDO(){
                if ($this->dbConnection instanceof dbConnection) {
                        return $this->dbConnection; //in boolean
                }
                return false;
        }

        public function close() {
                $this->dbConnection = null; //Closing PDO 
        }

}

        $dbhost = "localhost";
        $dbname = "scandiweb";
        $username = "root";
        $password = "";

        //$sql = "SELECT * FROM scandiweb";
        //$products = $dbConnection->query($sql);

        $dsn = "mysql:host = {$dbhost}; dbname = {$dbname}";

        $PDOError = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );


        try {
                DB::getInstance()->connect($dsn, $username, $password, $PDOError);
            } catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }

        //$sql = $dbConnection->query('SELECT * FROM `scandiweb`');
        //$products = $dbConnection->query($sql);

        //$SKU = $_POST['SKU'];
         //$name = $_POST['name'];
         //$price = $_POST['price'];
         //$weight = $_POST['weight'];
         //$size = $_POST['size'];
         //$HxDimensions = $_POST['HxDimensions'];
         //$WxDimensions = $_POST['WxDimensions'];
         //$LxDimensions = $_POST['LxDimensions'];

        //Posting Data to Database
     // if(isset($_POST['submit'])) {
        //$sqlInsert = "INSERT INTO `scandiweb` (`SKU`, `name`, `price`, `size`, `weight`, `HxDimensions`, `WxDimensions`, `LxDimensions`) VALUES (:SKU, :name, :price, :weight, :size, :HxDimensions, :WxDimensions, :LxDimensions)";
        //$insertResult = $dbConnection->prepare($sqlInsert);

        //$insertExec = $insertResult->execute(array(":SKU"=>$SKU, ":name"=>$name, ":price"=>$price, ":size"=>$size, ":weight"=>$weight, ":WxDimensions"=>$WxDimensions, ":HxDimensions"=>$HxDimensions, ":LxDimensions"=>$LxDimensions));


      //}
      function postData() {
        $insertResult = $this->db->prepare($sqlForAll);
        $insertExec = $insertResult->execute(array(":SKU"=>$SKU, ":name"=>$name, ":price"=>$price));
//In case if type "Furniture" has choosen...
        function postData() {
            $insertResult = $this->db->prepare($sqlForSize);
            $insertExec = $insertResult->execute(array(":size"=>$size));
//In case if type "Furniture" has choosen...
            function postData() {
                $insertResult = $this->db->prepare($sqlForFurniture);
                $insertExec = $insertResult->execute(array(":WxDimensions"=>$WxDimensions, ":HxDimensions"=>$HxDimensions, ":LxDimensions"=>$LxDimensions));
 //In case if type "Books" has choosen...
                function postData() {
                    $insertResult = $this->db->prepare($sqlForBooks);
                    $insertExec = $insertResult->execute(array(":weight"=>$weight));
                    return;
                }
            return;}
        return;}
    return;}
}
?>
