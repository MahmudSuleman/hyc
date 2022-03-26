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
        return $db->pdoQuery("SELECT * FROM all_purchases")->aResults;
    }

    public static function myPurchases(){
        global $db;
        $sql = "CALL usp_my_purchases(?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([0=> $_SESSION['username']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public  static  function delivered($purchase_id)
    {
        global $db;
        return $db->update('purchases', ['purchase_status_id'=>4], ['purchase_id' => $purchase_id]);
    }

    public  static  function revert($purchase_id)
    {
        global $db;
        return $db->update('purchases', ['purchase_status_id'=>1], ['purchase_id' => $purchase_id]);
    }

}
