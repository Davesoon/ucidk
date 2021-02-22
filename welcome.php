<?php
    session_start();

    if(!isset($_SESSION['sent']))
    {
        header('Location: index.php');
        exit();
    }
    else
    {
        unset($_SESSION['sent']);
    }

    //Usuwanie zmiennych pamiętających wartości wpisane do formularza
    if(isset($_SESSION['fr_firstname'])) unset($_SESSION['fr_firstname']);
    if(isset($_SESSION['fr_lastname'])) unset($_SESSION['fr_lastname']);
    if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
    if(isset($_SESSION['fr_phone'])) unset($_SESSION['fr_phone']);
    if(isset($_SESSION['fr_info'])) unset($_SESSION['fr_info']);
    if(isset($_SESSION['fr_regulations'])) unset($_SESSION['fr_regulations']);

    //Usuwanie błędów rejestracji
    if(isset($_SESSION['e_firstname'])) unset($_SESSION['e_firstname']);
    if(isset($_SESSION['e_lastname'])) unset($_SESSION['e_lastname']);
    if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if(isset($_SESSION['e_phone'])) unset($_SESSION['e_phone']);
    if(isset($_SESSION['e_info'])) unset($_SESSION['e_info']);
    if(isset($_SESSION['e_regulations'])) unset($_SESSION['e_regulations']);
    if(isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
    
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>ZALOGUJ</title>
</head>
<body>
    Dziękujemy za wysłanie formularza!
</body>