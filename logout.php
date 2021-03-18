<?php

session_start();
 
//Επαναφέρουμε όλες τις μεταβλητές $_SESSION
$_SESSION = array();
 
//Καταστροφη του session
session_destroy();
 
//επιστροφη στην αρχικη σελιδα 
header("location: index.html");
exit;
?>