<?php

class BookingModel {
    function create($user_id, $booking_date, $seats_amount){
        $sql = "INSERT INTO booking (User_Id, BookingTime, NumberOfSeats, CreationTimestamp) 
                VALUES (?,?,?,NOW())";

        $database = new Database();
        $database->executeSql($sql, [$user_id, $booking_date, $seats_amount]);
    }

    function delete(){
        //TODO : implement later
    }

    function find(){
        //TODO : implement later
    }

    function listAll(){
        $database = new Database();

        $sql = 'SELECT booking.*, FirstName, LastName FROM booking
                LEFT JOIN user ON booking.User_Id = user.Id
                ';

        return $database->query($sql);
    }
}