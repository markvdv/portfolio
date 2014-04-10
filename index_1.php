
<?php

session_start();
use Doctrine\Common\ClassLoader;

require_once ('Doctrine/Common/ClassLoader.php');
$classLoader = new ClassLoader("Portfolio", "Src");
$classLoader->register();
$classLoader->setFileExtension(".class.php");

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    switch ($_SESSION['lvl']) {
        case '1':
            header("location:presentation/frontend.php");
            break;
        case '5':
            header('location:CMScontroller.php');
            break;
    }
} else {
    header('location:usercontroller.php');
}