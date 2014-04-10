<?php
require_once 'business/UserService.class.php';
/* 
 regeisteform nog handelen
 */
session_start();
if (isset($_POST['submit'])) {
    //checken of alle velden zijn ingevuld
    //checken of passwoord hetzelfde is als confpasswoord
    // checken of email al bestaat
    // checken of username al bestaat
    //checks in servicelaag
    try{
    UserService::registreerUser($_POST['email'],  $_POST['username'],  $_POST['password'],  $_POST['confirm_password']);
    header("location:presentation/frontend.php");
    exit(0);
    }
    catch(EmailAlreadyRegisteredException $EARE){
        $error='email_registered';
    }
}
else{
 include "presentation/registerform.php";
}