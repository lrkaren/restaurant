<?php

/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 04/05/2017
 * Time: 14:52
 */
class MealModel {
    /**
     * @param $name string le nom du plat
     * @param $description string présentation du plat
     * @param $photo string nom du fichier image dans le dossier de vues
     * @param $quantityInStock int
     * @param $buyPrice float
     * @param $salePrice float
     */
    public function create($name, $description, $photo, $quantityInStock,$buyPrice, $salePrice ){
        $database = new Database();
        $sql = "INSERT 
                INTO meal (Name, Description, Photo, QuantityInStock, BuyPrice, SalePrice) 
                VALUES (:Name, :Description, :Photo, :QuantityInStock, :BuyPrice, :SalePrice)
        ";

        $database->executeSql($sql, [
            ':Name' => $name,
            ':Description' => $description,
            ':Photo' => $photo,
            ':QuantityInStock' => $quantityInStock,
            ':BuyPrice' => $buyPrice,
            ':SalePrice' => $salePrice]);
    }

    // find
    public function find($meal_id){
        $sql ="SELECT * FROM meal WHERE id=?";
        $database = new Database();
        return $database->queryOne($sql, [$meal_id]);
    }

    // listAll
    public function listAll(){
        $database = new Database();
        return $database->query("SELECT * FROM meal");
    }
}
