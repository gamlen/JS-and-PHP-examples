<?php

namespace engine\models;

use engine\lib\Db;

abstract class Polymorphism {

    abstract function postData();
}

class AnyCase extends Polymorphism {
        function postData() {
            $sqlForAll = "INSERT INTO `scandiweb` (`SKU`, `name`, `price`) VALUES (:SKU, :name, :price)";
            $sqlForAll = $this->db->db->prepare($sqlForAll);
            $sqlForAll->bindParam(':SKU', $_POST['SKU']);
            $sqlForAll->bindParam(':name', $_POST['name']);
            $sqlForAll->bindParam(':price', $_POST['price']);
            $sqlForAll->execute();
            return $sqlForAll;
        }
};
//In case if type "Size" has choosen...
class Size extends Polymorphism {
        function postData() {
            $sqlForSize = "INSERT INTO `scandiweb` (`size`) VALUES (:size)";
            $sqlForSize = $this->db->db->prepare($sqlForSize);
            $sqlForSize->bindParam(':size', $_POST['size']);
            $sqlForSize->execute();
            return $sqlForSize;
        }
};
//In case if type "Furniture" has choosen...
class Furniture extends Polymorphism {
        function postData() {
            $sqlForFurniture = "INSERT INTO `scandiweb` (`HxDimensions`, `WxDimensions`, `LxDimensions`) VALUES (:HxDimensions, :WxDimensions, :LxDimensions)";
            $sqlForFurniture = $this->db->db->prepare($sqlForFurniture);
            $sqlForFurniture->bindParam(':HxDimensions', $_POST['HxDimensions']);
            $sqlForFurniture->bindParam(':WxDimensions', $_POST['WxDimensions']);
            $sqlForFurniture->bindParam(':LxDimensions', $_POST['LxDimensions']);
            $sqlForFurniture->execute();
            return $sqlForFurniture;
        }
};
//In case if type "Books" has choosen...
class Books extends Polymorphism {
        function postData() {
            $sqlForBook = "INSERT INTO `scandiweb` ( `weight`) VALUES (:weight)";
            $sqlForBook = $this->db->db->prepare($sqlForBook);
            $sqlForBook->bindParam(':weight', $_POST['weight']);
            $sqlForBook->execute();
            return $sqlForBook;
        }
};
