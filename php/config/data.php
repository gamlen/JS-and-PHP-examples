<?php
;
require 'db.php';

ini_set('display_errors',1);
error_reporting(E_ALL);


//Receiving data from productAdd.php page. To check and change them, if we have needs for it.
//Also sending them to DB
 $SKU = $_POST['SKU'];
 $name = $_POST['name'];
 $price = $_POST['price'];
 $weight = $_POST['weight'];
 $size = $_POST['size'];
 $HxDimensions = $_POST['HxDimensions'];
 $WxDimensions = $_POST['WxDimensions'];
 $LxDimensions = $_POST['LxDimensions'];

 $dbConnection = DB::getInstance()->getPDO();


if(isset($_POST['submit'])) {

    abstract class DataPost {
        

    //SQL Requests for all cases
        public $sqlForAll = "INSERT INTO `scandiweb` (`SKU`, `name`, `price`) VALUES (:SKU, :name, :price)";
        public $sqlForSize = "INSERT INTO `scandiweb` (`size`) VALUES (:size)";
        public $sqlForFurniture = "INSERT INTO `scandiweb` (`HxDimensions`, `WxDimensions`, `LxDimensions`) VALUES (:HxDimensions, :WxDimensions, :LxDimensions)";
        public $sqlForBook = "INSERT INTO `scandiweb` ( `weight`) VALUES (:weight)";


    //Method Post

        abstract function postData();
            
        }

        
        class AnyCase extends DataPost {
            function postData() {
                $insertResult = $dbConnection->prepare($sqlForAll);
                $insertExec = $insertResult->execute(array(":SKU"=>$SKU, ":name"=>$name, ":price"=>$price));
            }
        };
    //In case if type "Size" has choosen...
        class Size extends DataPost {
                function postData() {
                    $insertResult = $dbConnection->prepare($sqlForSize);
                    $insertExec = $insertResult->execute(array(":size"=>$size));
                }
        };
    //In case if type "Furniture" has choosen...
        class Furniture extends DataPost {
                function postData() {
                    $insertResult = $dbConnection->prepare($sqlForFurniture);
                    $insertExec = $insertResult->execute(array(":WxDimensions"=>$WxDimensions, ":HxDimensions"=>$HxDimensions, ":LxDimensions"=>$LxDimensions));
                }
        };
    //In case if type "Books" has choosen...
        class Books extends DataPost {
                function postData() {
                    $insertResult = $dbConnection->prepare($sqlForBooks);
                    $insertExec = $insertResult->execute(array(":weight"=>$weight));
                }
        };
}

?>