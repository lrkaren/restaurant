<?php

/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 03/05/2017
 * Time: 15:04
 */
class ContactController {
    public function httpGetMethod(Http $http, array $queryFields) {

       var_dump($http);
       var_dump($queryFields);

       echo 'je suis en get';

    }

    public function httpPostMethod(Http $http, array $formFields) {

        var_dump($http);
        var_dump($formFields);

        echo "je suis en post, j'ai validé mon formulaire";

    }
}