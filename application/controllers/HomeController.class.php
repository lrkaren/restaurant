<?php

class HomeController
{

    /**
     * Méthode appelée en cas de requête HTTP GET
     * @param Http $http  est un objet permettant de faire des redirections etc.
     * @param array $queryFields contient l'équivalent de $_GET en PHP natif.
     * @return array retourne les variables destinées à la vue
     */
    public function httpGetMethod(Http $http, array $queryFields) {

        // c'est ici qu'on renvoi les données à la vue avec son nom de variable comme index
        $meal = new MealModel();

        return [
            'menus' => $meal->listAll()
        ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    }
}