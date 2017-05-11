<?php

class UserModel{

    public function create($firstName, $lastName, $email, $password, $birthDate, $address, $city,$zipCode, $phone, $country){
        $database = new Database();

        $sql = "SELECT id FROM user WHERE Email = ?";
        $user = $database->queryOne($sql, [$email]);

        if(empty($user) == false){
            throw new DomainException('Il existe déjà un compte avec l\'email '.$email);
        }

        $sql = "INSERT INTO user (FirstName, LastName, Email, Password, BirthDate, Address, City, ZipCode, Phone, Country, CreationTimestamp) 
                VALUES (?,?,?,?,?,?,?,?,?,?, NOW())";

        return $database->executeSql($sql, [$firstName, $lastName, $email, $password, $birthDate, $address, $city,$zipCode, $phone, $country]);

    }

    public function findByEmail($email){
        $sql = "SELECT Id, FirstName, LastName, Email, Password, Admin FROM user WHERE Email = ?";
        $db = new Database();
        return $db->queryOne($sql, [$email]);
    }


    public function find($user_id){
        $sql ="SELECT * FROM user WHERE id=?";
        $database = new Database();
        return $database->queryOne($sql, [$user_id]);
    }

    public function listAll(){
        $database = new Database();
        return $database->query("SELECT * FROM user");
    }

    public function delete($user_id){
        $sql = 'DELETE FROM user WHERE id=?';
        $database = new Database();
        $database->query($sql, [$user_id]);
    }
}