<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['lvl']==5) {
    header('location:presentation/CMS.php');
 exit(0);
}
else if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true && $_SESSION['lvl']!=5) {
    header("location:index.php");
    exit(0);
}
