<?php

session_start();

function dbConnect() {

    $host       = 'localhost';  
    $dbname     = 'immobilier_haikouhi';  
    $port       = '3308';       
    $login      = 'root';       
    $password   = '';           

    try {
        $instanceBdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8;port='.$port, $login, $password);

    }


    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $instanceBdd;
}


function formError($err) {

    $_SESSION['form_error'][] = $err;
    Header('Location: add.php');

}


