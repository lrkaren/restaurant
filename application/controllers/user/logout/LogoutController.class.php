<?php

class LogoutController{

    function httpGetMethod(Http $http){
        $session = new UserSession();
        $session->destroy();
        $http->redirectTo();
    }
}