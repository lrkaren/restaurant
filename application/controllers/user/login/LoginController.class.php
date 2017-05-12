<?php

class LoginController {
    public function httpGetMethod(){
        return [
            '_form' => new LoginForm()
        ];
    }

    public function httpPostMethod(Http $http, array $formFields){

        try{
            // on récupère les données utilisateurs grace au formulaire
            $userModel = new UserModel();
            $user = $userModel->loginByEmail($formFields['email'], $formFields['password']);

            // si c'est le cas on connecte l'utilisateur en créant la session
            $session = new UserSession();
            $session->create($user['Id'], $user['FirstName'], $user['LastName'], $user['Email'], $user['Admin']);

            // ajout d'un petit message pour le fun
            $flashBag = new FlashBag();
            $flashBag->add('Bonjour '. $session->getFullName() .' content de vous revoir !');

            // enfin on le redirige vers l'accueil
            $http->redirectTo();

        } catch (DomainException $exception){

            // on récupère les information du formulaire et on associe à la classe Form
            $form = new LoginForm();
            $form->bind($formFields);

            // on renvoit un message d'erreur
            $form->setErrorMessage($exception->getMessage());

            // en renvoit les données du formaulaire à la vue
            return [
                '_form' => $form
            ];
        }
    }
}


/*
  $session = new UserSession();
        $database = new Database();
        $sql = "SELECT FirstName,LastName, Id, Password, Email FROM user WHERE email = ?";
        $user = $database->queryOne($sql, [$formFields['mail']]);

        if( !empty($user) && $formFields['password'] == $user['Password']){

            $session->create($user['Id'], $user['FirstName'], $user['LastName'], $user['Email']);

        } else {
            echo "mauvais mot de passe ou identifiant";
        }

        return [ 'session' => $session ];
 */







/*
        if(!empty($user) && $user['Password'] == $formFields['password']){
            echo "utilisateur connectable";
        } else {
            echo "mauvais mot de passe ou identifiant";
        }
*/