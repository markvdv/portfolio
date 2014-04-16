<?php
use Doctrine\Common\ClassLoader;
require_once ('Doctrine/Common/ClassLoader.php');
$classLoader = new ClassLoader("Src", "Portfolio");
$classLoader->setFileExtension(".class.php");
$classLoader->register();
use Src\Data\ProjectDAO;
$projecten=ProjectDAO::getAll();

$json =json_encode($projecten);

print $json;
