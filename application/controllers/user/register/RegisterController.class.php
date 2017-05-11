<?php

class RegisterController {
    public function httpGetMethod(Http $http, array $queryFields) {
        return ['_form' => new RegisterForm()];
    }

    public function httpPostMethod(Http $http, array $formFields){

        $birthDate = $formFields['birthYear'] .'-'.$formFields['birthMonth'].'-'.$formFields['birthDay'];

        $user = new UserModel();

        try{

            // Création du compte utilisateur
            $userId = $user->create(
                $formFields['firstName'],
                $formFields['lastName'],
                $formFields['email'],
                $formFields['password'],
                $birthDate,
                $formFields['address'],
                $formFields['city'],
                $formFields['zipCode'],
                $formFields['phone'],
                $formFields['country']
            );

            // Connexion de l'utilisateur en utilisant PDO->lastInsertId()
            $session = new UserSession();
            $session->create($userId, $formFields['firstName'], $formFields['lastName'], $formFields['email']);

            // Génération du message flashBag
            $flashBag = new FlashBag();
            $flashBag->add('Félicitation '. strip_tags($formFields['firstName']).', votre compte à bien été enregistré' );

            // redirection de l'utilisateur vers l'accueil pour éviter les doublons de création
            $http->redirectTo();

        } catch(DomainException $exception){

            $form = new RegisterForm();
            $form->bind($formFields);
            $form->setErrorMessage($exception->getMessage());

            return [
                '_form' => $form
            ];
        }


    }
}