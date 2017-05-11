<?php

class DashboardController {

    function httpGetMethod(Http $http){

        $session = new UserSession();
        if( $session->isAdmin() == false){
            $http->redirectTo();
        }

        $users = new UserModel();
        $booking = new BookingModel();
        $meals= new MealModel();

        return [
            'users' => $users->listAll(),
            'booking' => $booking->listAll() ,
            'meals' => $meals->listAll(),
        ];
    }

}