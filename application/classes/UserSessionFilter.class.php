<?php

/**
 * fichier du filtre d'interception UserSessionFilter qui rend la classe UserSession
 * accessible sur n'importe quelle page.
 *
 * Attention elle marche avec le fichier de configuration adéquat
 *
 */


class UserSessionFilter implements InterceptingFilter{

    function run(Http $http, array $queryFields, array $formFields){

        return [
            'session' => new UserSession(),
        ];
    }
}