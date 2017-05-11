<?php

class BookingController{

    function httpPostMethod($http, $formFields){
        $session = new UserSession();
        if($session->isLogged() == false ){
            $http->redirectTo();
        }

        $bookingTime =  $formFields['bookingYear'] .'-'.
                        $formFields['bookingMonth'].'-'.
                        $formFields['bookingDay'].' '.
                        $formFields['bookingHour'].':'.
                        $formFields['bookingMinute'];

        $booking = new BookingModel();
        $booking->create(
            $session->getUserId(),
            $bookingTime,
            $formFields['seat_amount']
        );

        $flashBag = new FlashBag();
        $flashBag->add('Merci ! Votre réservation est bien enregistré');
        $http->redirectTo();
    }

    function httpGetMethod(Http $http){
        $session = new UserSession();
        if($session->isLogged() == false ){
            $http->redirectTo();
        }
    }
}


