<?php
require_once(__DIR__ . '/../Models/User.php');
require_once(__DIR__ . '/../../config/function.php');

$user = new User;

// si l'utilisateur est connecté alors on le redirige vers la pqge principale
if (isset($_SESSION['user'])) {
    redirectToRoute('/');
}

if (isset($_POST['email']) && isset($_POST['password'])) {

    // on met les information du formulaire dans des variable
    $email = $_POST['email'];
    $password = $_POST['password'];


    // verification de la validité de l'email puis de la presence de l'email en bdd
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid Email";
        require_once(__DIR__ . '/../Views/security/login.view.php');
        exit;
    }

    $user->setEmail($email);
    $userConnection = $user->checkUserExists();

    //S'il existe on récupére les informations
    if ($userConnection) {

        $loginInfo = $user->getLoginInfo();

        if (password_verify($password, $loginInfo->password)) {
            $_SESSION['user'] = [
                'id' => uniqid(),
                'email' => $loginInfo->email,
                'pseudo' => $loginInfo->pseudo,
                'idUser' => $loginInfo->id,
            ];
            redirectToRoute('/');
        } else {
            $error = "incorrect Email or Password";
        }
    } else {
        $error = "incorrect Email or Password";
    }
}
require_once(__DIR__ . '/../Views/security/login.view.php');
