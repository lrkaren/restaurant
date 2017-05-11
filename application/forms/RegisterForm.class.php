<?php

class RegisterForm extends Form {
    function build() {
        $this->addFormField('lastName');
        $this->addFormField('firstName');
        $this->addFormField('birthDay');
        $this->addFormField('birthMonth');
        $this->addFormField('birthYear');
        $this->addFormField('address');
        $this->addFormField('city');
        $this->addFormField('zipCode');
        $this->addFormField('country');
        $this->addFormField('phone');
        $this->addFormField('email');
        //$this->addFormField('password');
    }
}