<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/9/2020
 * Time: 9:27 AM
 */

class Product {

    public $product_id;
    public $name;
    public $description;
    public $image;
    public $category;
    public $price;
    public $quantity;

    public function __construct($arg =[])
    {
        $this->name = $arg['name'] ?? '';
        $this->category = $arg['category'] ?? '';
        $this->description = $arg['description'] ?? '';
        $this->image = $arg['image'] ?? '';
        $this->product_id = $arg['product_id'] ?? '';
        $this->price = $arg['price'] ?? '';
        $this->quantity = $arg['quantity'] ?? '';
    }


    public static function allProducts()
    {
        try
        {
            $con = Db::connect();
            $sql = "SELECT * FROM  products";
            $result = $con->query($sql);
            if($result)
            {
                return $result->fetchAll(PDO::FETCH_ASSOC);
            }
            else
            {
                echo 'no results found';
            }

        }catch (Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public static function findProduct($id)
    {
        try {

            $sql = "SELECT * FROM products WHERE product_id = '".$id."'";
            $con = Db::connect();
            $result = $con->query($sql);
            if($result){
                return $result->fetch(PDO::FETCH_ASSOC);
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function addToCart($product_id, $userName){
        try {
            $time = date('y/m/d');
            $sql = "INSERT INTO cart(product_id, date_added, userName) VALUES ('$product_id', '$time', '$userName')";
            $con = Db::connect();
            if($con->query($sql))
                return true;
            else
                header("location: cart.php");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function cartProduct($id)
    {
        try {
            $products = [];
            $sql = "SELECT product_id FROM cart WHERE userName = '".$_SESSION['userName']."'";
            $con = Db::connect();
            $result = $con->query($sql);
            if($result){
                foreach($result->fetchAll(PDO::FETCH_ASSOC) as $data){
                    array_push($products, $data['product_id']);
                }
            }
            $errorInfo = $con->errorInfo();
            if(isset($errorInfo[2])){
                echo $errorInfo[2];
            }

            $sql2 = '';
            $sql2 .= "SELECT * FROM products WHERE product_id in (";
            for($i=0; $i<count($products); $i++){
                if($i != count($products) - 1){
                    $sql2 .= "'".$products[$i]."',";
                }else{
                    $sql2 .= "'".$products[$i]."'";
                }

            }
            $sql2 .= ")";
            $cartData = $con->query($sql2);
            if($cartData){
                return $cartData->fetchAll(PDO::FETCH_ASSOC);
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



    public function addProduct()
    {
        try {
            $image = self::uploadImage($_FILES, $this->product_id);
            $image = substr($image, 3);
            $con = Db::connect();
            $sql = "INSERT INTO products(product_id, name, description, price, category, image, quantity)
                    VALUES (:p_id, :name, :desc, :price, :cat, :img, :qty)";
            $stmt = $con->prepare($sql);

            $data = [
                ':p_id'=>$this->product_id,
                ':name'=>$this->name,
                ':desc'=>$this->description,
                ':price'=>$this->price,
                ':cat'=>$this->category,
                ':qty'=>$this->quantity,
                ':img'=>$image
            ];

            $errorInfo = $stmt->errorInfo();
            if(isset($errorInfo[2])){
                echo $errorInfo[2];
            }else{
                return $stmt->execute($data);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function updateProduct($id)
    {
        try {
            $image = self::uploadImage($_FILES, $this->product_id);
            $image = substr($image, 3);
            $con = Db::connect();
            $sql = "UPDATE products SET  name = :name, description = :desc, price = :price
                          , category = :cat, image = :img, quantity = :qty WHERE product_id = $id";

            $stmt = $con->prepare($sql);

            $data = [

                ':name'=>$this->name,
                ':desc'=>$this->description,
                ':price'=>$this->price,
                ':cat'=>$this->category,
                ':qty'=>$this->quantity,
                ':img'=>$image
            ];

            $errorInfo = $stmt->errorInfo();
            if(isset($errorInfo[2])){
                echo $errorInfo[2];
            }else{
                return $stmt->execute($data);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static  function uploadImage($files, $product_id)
    {
        $file = $files['pic'];
        $name = $file['name'];
        $size = $file['size'];
        $tmpName = $file['tmp_name'];
        $fileArray = explode('.', $name);
        $allowed = ['jpg', 'jpeg', 'png'];
        $ext = strtolower(end($fileArray));
        $loc = '../img/'. uniqid(). '.'.$ext;

        if(in_array($ext,$allowed )){
            if($size <= 2000000 )
            {
                move_uploaded_file($tmpName, $loc);
                return $loc;
            }
            else
            {
                echo 'file too big';

            }
        }
        else
        {
            echo 'Unsupported file format';
        }

    }

    public static function findSearchedProducts($product)
    {
        global $db;
        $sql = "SELECT * FROM products WHERE name LIKE ?";
        $data = ['%'.trim($product).'%'];
        return $db->pdoQuery($sql, $data)->aResults;
    }

    public static function  deleteProduct($product)
    {
        global $db;
        $sql = "DELETE FROM products WHERE product_id = '". $product."'";
        return $db->pdoQuery($sql, ['product_id', $product])->showQuery();
    }
} 