<?php

class UserSession {

    function __construct() {

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public function create($userId, $firstName, $lastName, $email, $isAdmin = false){
        // Construction de la session utilisateur.
        $_SESSION['user'] = [
            'id'        => $userId,
            'firstName' => $firstName,
            'lastName'  => $lastName,
            'email'     => $email,
            'isAdmin'   => $isAdmin,
        ];
    }

    public function destroy(){
        $_SESSION = [];
        session_destroy();
    }

    public function getEmail(){
        if($this->isLogged()){
            return $_SESSION['user']['mail'];
        }
        return null;
    }

    public function getFullName(){
        if($this->isLogged()){
            return $_SESSION['user']['firstName'] .' '. $_SESSION['user']['lastName'];
        }
        return null;
    }

    public function getUserId(){
        if($this->isLogged()){
            return $_SESSION['user']['id'];
        }
        return null;
    }

    public function isAdmin(){
        if(array_key_exists('user', $_SESSION)){
            if(!empty($_SESSION['user'])){
                if($_SESSION['user']['isAdmin'] == true){
                    return true;
                }
            }
        }
        return false;
    }

    public function isLogged(){
        // on vérifie que la clé user existe dans la session
        if(array_key_exists('user', $_SESSION)){

            // on vérifie que cette variable n'est pas vide
            if(!empty($_SESSION['user'])){
                return true;
            }
        }

        // sinon en renvoi false
        return false;

        // tout le test pourrait tenir sur une seule ligne
        // return array_key_exists('user', $_SESSION) && !empty($_SESSION['user']);
    }
}

