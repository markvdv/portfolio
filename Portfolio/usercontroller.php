<?php

use Portfolio\Business\UserService;

session_start();

require_once("lib/Twig/Autoloader.php");
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("Src/Portfolio/Presentation");
$twig = new Twig_Environment($loader, array('debug' => true));


if (isset($_POST['username']) && isset($_POST['password'])) {
    try {
        $result = UserService::controleerUserLogin($_POST['username'], $_POST['password']);
        if ($result) {
            $_SESSION['loggedin'] = true;
            $_SESSION['lvl'] = $result->getAccessLvl();
            header("location:index.php");
            exit(0);
        }
    } catch (UserNotFoundException $UNFE) {
        $error = "user_not_found";
    } catch (IncorrectPwException $IPWE) {
        $error = "incorrect_password";
    }
    $view = $twig->render('loginform.twig');
    echo $view;
    exit(0);
} else if (isset($_GET['action']) && $_GET['action'] == 'guest') {
    echo "Still working on this one!";
} else {
    $view = $twig->render('loginform.twig');
    echo $view;
    exit(0);
}





