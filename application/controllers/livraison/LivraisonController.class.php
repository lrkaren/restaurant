<?php

class LivraisonController {

    function httpGetMethod(){

        $meals = new MealModel();


        return [
            'menus' => $meals->listAll()
        ];
    }
}


