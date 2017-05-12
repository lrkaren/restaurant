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

        return $database->executeSql($sql, [$firstName, $lastName, $email, $this->hashPassword($password), $birthDate, $address, $city,$zipCode, $phone, $country]);

    }

    public function loginByEmail($email,$password){
        // on tente de récupérer l'utilisateur dans la base de données
        $sql = "SELECT Id, FirstName, LastName, Email, Password, Admin FROM user WHERE Email = ?";
        $db = new Database();
        $user = $db->queryOne($sql, [$email]);

        // l'email n'a pas été trouvé dans la base on lance une exception
        if(empty($user) || !$this->verifyPassword($password, $user['Password']))
            throw  new DomainException('Mauvais login ou mot de passe');

        return $user;
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

    private function hashPassword($pass){
        /*
         * Génération du sel, nécessite l'extension PHP OpenSSL pour fonctionner.
         *
         * openssl_random_pseudo_bytes() va renvoyer n'importe quel type de caractères.
         * Or le chiffrement en blowfish nécessite un sel avec uniquement les caractères
         * a-z, A-Z ou 0-9.
         *
         * On utilise donc bin2hex() pour convertir en une chaîne hexadécimale le résultat,
         * qu'on tronque ensuite à 22 caractères pour être sûr d'obtenir la taille
         * nécessaire pour construire le sel du chiffrement en blowfish.
         */
        $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)),0,22);
        // Voir la documentation de crypt() : http://devdocs.io/php/function.crypt
        return crypt($pass, $salt);
    }

    private function verifyPassword($pass,$hashedPass){
        // Si le mot de passe en clair est le même que la version hachée alors renvoie true.
        return crypt($pass, $hashedPass) == $hashedPass;
    }
}