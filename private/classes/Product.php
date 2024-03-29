<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/9/2020
 * Time: 9:27 AM
 */

class Product extends  Model
{

    public $product_id;
    public $name;
    public $description;
    public $image;
    public $category_id;
    public $price;
    public $quantity;

    public function __construct($arg = [])
    {
        $this->name = $arg['name'] ?? '';
        $this->category_id = $arg['category_id'] ?? '';
        $this->description = $arg['description'] ?? '';
        $this->image = $arg['image'] ?? '';
        $this->product_id = $arg['product_id'] ?? '';
        $this->price = $arg['price'] ?? '';
        $this->quantity = $arg['quantity'] ?? '';
    }


    public static function allProducts()
    {
        try {
            $con = Db::connect();
            $sql = "SELECT * FROM  products WHERE quantity > 0";
            $result = $con->query($sql);
            if ($result) {
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } else {
                echo 'no results found';
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public static function findProduct($id)
    {
        try {

            $sql = "SELECT * FROM products WHERE product_id = '" . $id . "'";
            $con = Db::connect();
            $result = $con->query($sql);
            if ($result) {
                return $result->fetch(PDO::FETCH_ASSOC);
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function addToCart($product_id, $userName)
    {
        try {
            $time = date('y/m/d');
            $sql = "INSERT INTO carts(product_id, username) VALUES ('$product_id', '$userName')";
            $con = Db::connect();
            if ($con->query($sql))
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
            $sql = "SELECT product_id FROM carts WHERE username = '" . $_SESSION['username'] . "'";
            $con = Db::connect();
            $result = $con->query($sql);

            foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $data) {
                $products[] = $data['product_id'];
            }

            $errorInfo = $con->errorInfo();
            if (isset($errorInfo[2])) {
                echo $errorInfo[2];
            }

            if(count($products) == 0){
                return [];
            }

            $sql2 = "SELECT * FROM products WHERE product_id in (";
            for ($i = 0; $i < count($products); $i++) {
                if ($i != count($products) - 1) {
                    $sql2 .= "'" . $products[$i] . "',";
                } else {
                    $sql2 .= "'" . $products[$i] . "'";
                }

            }
            $sql2 .= ")";
            $cartData = $con->query($sql2);
            if ($cartData) {
                return $cartData->fetchAll(PDO::FETCH_ASSOC);
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function addProduct()
    {
        try {
            $con = Db::connect();
            $sql = "INSERT INTO products(product_id, name, description, price, category_id, image, quantity)
                    VALUES (:p_id, :name, :desc, :price, :cat, :img, :qty)";
            $stmt = $con->prepare($sql);

            $data = [
                ':p_id' => $this->product_id,
                ':name' => $this->name,
                ':desc' => $this->description,
                ':price' => $this->price,
                ':cat' => $this->category_id,
                ':qty' => $this->quantity,
                ':img' => $this->image
            ];

            $errorInfo = $stmt->errorInfo();
            if (isset($errorInfo[2])) {
               return  false;
            } else {
                return $stmt->execute($data);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function updateProduct($id)
    {
        try {
            $con = Db::connect();
            $sql = "UPDATE products SET  name = :name, description = :desc, price = :price
                          , category_id = :cat, image = :img, quantity = :qty WHERE product_id = $id";

            $stmt = $con->prepare($sql);

            $data = [
                ':name' => $this->name,
                ':desc' => $this->description,
                ':price' => $this->price,
                ':cat' => $this->category_id,
                ':qty' => $this->quantity,
                ':img' => $this->image
            ];

            $errorInfo = $stmt->errorInfo();
            if (isset($errorInfo[2])) {
                echo $errorInfo[2];
            } else {
                return $stmt->execute($data);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public static function findSearchedProducts($product)
    {
        global $db;
        $sql = "SELECT * FROM products WHERE name LIKE '%" . trim($product) . "%'";
//        $data = ['%'.trim($product).'%'];
        return $db->pdoQuery($sql)->aResults;
    }

    public static function deleteProduct($product)
    {
        global $db;
        $sql = "DELETE FROM products WHERE product_id = ?";

        return $db->pdoQuery($sql, [$product])->showQuery();
    }

    public static function productIsAvailable($product_id)
    {
        global $db;
        $available = false;
        $db->select('products', ['quantity'], ['product_id' => $product_id]);
        $result = $db->aResults[0]['quantity'];
        if ($result != 0) {
            $available = true;
        }
        return $available;

    }

    public static function reduceProductCount($quantity, $product_id)
    {
        global $db;
        $reduced = false;
//        get the quantity value for the product selected...
        $db->select('products', ['quantity'], ['product_id' => $product_id]);
        $result = $db->aResults[0]['quantity'];
        $new_quantity = (int)($result) - $quantity;
        if (!($new_quantity <= 0)) {
            $db->update('products', ['quantity' => $new_quantity], ['product_id' => $product_id]);
            $reduced = true;
        }

        return $reduced;

    }

    public static function quantityAvailable($product_id)
    {
        global $db;
        $db->select('products', ['quantity'], ['product_id' => $product_id]);
        return (int)$db->aResults[0]['quantity'];
    }


}
