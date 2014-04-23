<?php

/* 
klaarzetten van de doctrine autoloader en twig om hopelijk die niet meer te hoeven instantieren
 */
use Doctrine\Common\ClassLoader;
require_once ('Doctrine/Common/ClassLoader.php');
$classLoader = new ClassLoader("Src", "Portfolio");
$classLoader->setFileExtension(".class.php");
$classLoader->register();

require_once("lib/Twig/Autoloader.php");
Twig_Autoloader::register(); 
$loader = new Twig_Loader_Filesystem("Portfolio/Src/Presentation");

$twig = new Twig_Environment($loader,array('debug'=>true));
$twig->addExtension(new Twig_Extension_Debug);

if(isset($_GET['error'])){
$view= $twig->render('aboutme.twig',array("error"=>$_GET['error']));
    
}
else{
//$view= $twig->render('aboutme.twig');
$view= $twig->render('portfolio.twig');
}
echo $view;

