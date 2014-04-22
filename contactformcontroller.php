<?php
use Doctrine\Common\ClassLoader;
require_once ('Doctrine/Common/ClassLoader.php');
$classLoader = new ClassLoader("Src", "Portfolio");
$classLoader->setFileExtension(".class.php");
$classLoader->register();


use Src\Classlib\FormVal;
use Src\Exceptions\TextContainsHTMLException;
echo'hello';



echo "<pre>";
print_r($_POST);
echo "</pre>";
echo __LINE__ . "<br>" . __FILE__ . "<br>";
try{
$test= FormVal::hasHTML($_POST['message']);
}
catch(TextContainsHTMLException $TCHe){
 header("location:index.php?error=textHasHtml");   
}
mail("markvanderveken@gmail.com","New Message",$_POST['message'],"From:".$_POST['email']);
die;
header("location:index.php");
exit(0);

