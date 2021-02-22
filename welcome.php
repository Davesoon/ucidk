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