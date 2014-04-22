<?php
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


$view=$twig->render('aboutme.twig');
echo $view;

