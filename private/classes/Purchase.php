<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/11/2020
 * Time: 7:56 PM
 */

class Purchase {

    public static function addPurchase($username, $product_id,$unit,$qty, $total_price){
        global $db;
        $purchase_id = uniqid("pch");
        $data = ['username'=>$username,
            'product_id'=>$product_id,
            'total_price' => $total_price,
            'unit_price' =>$unit,
            'quantity' => $qty,
            'purchase_id' => $purchase_id
        ];
        return $db->insert("purchases", $data);



    }

    public  static  function  allPurchases(){
        global $db;
        return $db->pdoQuery("SELECT * FROM purchases")->aResults;
    }

    public static function myPurchases(){
        global $db;
        $sql = "SELECT products.product_id, products.name, products.description, products.image, purchases.unit_price, purchases.total_price, purchases.purchase_date, purchases.purchase_status, purchases.quantity
                      FROM products INNER JOIN purchases WHERE products.product_id = purchases.product_id";
        return $db->pdoQuery($sql)->aResults;
    }

    public  static  function delivered($purchase_id)
    {
        global $db;
        return $db->update('purchases', ['purchase_status'=>'delivered'], ['purchase_id' => $purchase_id]);
    }

    public  static  function revert($purchase_id)
    {
        global $db;
        return $db->update('purchases', ['purchase_status'=>'pending'], ['purchase_id' => $purchase_id]);
    }

}