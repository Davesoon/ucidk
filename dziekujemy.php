<?php
    session_start();

    if(!isset($_SESSION['sent']))
    {
        header('Location: zaloguj.php');
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
    if(isset($_SESSION['fr_direction'])) unset($_SESSION['fr_direction']);
    if(isset($_SESSION['fr_number'])) unset($_SESSION['fr_number']);
    if(isset($_SESSION['fr_hqProvince'])) unset($_SESSION['fr_hqProvince']);
    if(isset($_SESSION['fr_hqCity'])) unset($_SESSION['fr_hqCity']);
    if(isset($_SESSION['fr_desc'])) unset($_SESSION['fr_desc']);
    if(isset($_SESSION['fr_regulations'])) unset($_SESSION['fr_regulations']);

    if(isset($_SESSION['fr_suspect'])) unset($_SESSION['fr_suspect']);
    if(isset($_SESSION['fr_suspectId'])) unset($_SESSION['fr_suspectId']);
    if(isset($_SESSION['fr_hq'])) unset($_SESSION['fr_hq']);
    if(isset($_SESSION['fr_incCity'])) unset($_SESSION['fr_incCity']);
    if(isset($_SESSION['fr_incProvince'])) unset($_SESSION['fr_incProvince']);

    //Usuwanie błędów rejestracji
    if(isset($_SESSION['e_firstname'])) unset($_SESSION['e_firstname']);
    if(isset($_SESSION['e_lastname'])) unset($_SESSION['e_lastname']);
    if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if(isset($_SESSION['e_direction'])) unset($_SESSION['e_direction']);
    if(isset($_SESSION['e_number'])) unset($_SESSION['e_number']);
    if(isset($_SESSION['e_hqProvince'])) unset($_SESSION['e_hqProvince']);
    if(isset($_SESSION['e_hqCity'])) unset($_SESSION['e_hqCity']);
    if(isset($_SESSION['e_desc'])) unset($_SESSION['e_desc']);
    if(isset($_SESSION['e_regulations'])) unset($_SESSION['e_regulations']);
    if(isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);

    if(isset($_SESSION['e_suspect'])) unset($_SESSION['e_suspect']);
    if(isset($_SESSION['e_suspectId'])) unset($_SESSION['e_suspectId']);
    if(isset($_SESSION['e_hq'])) unset($_SESSION['e_hq']);
    if(isset($_SESSION['e_incCity'])) unset($_SESSION['e_incCity']);
    if(isset($_SESSION['e_incProvince'])) unset($_SESSION['e_incProvince']);
    
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="styles/forms.css">
    <title>Dziękujemy!</title>
</head>
<body>
    <header>
        <img src="images/logo.png">
        <h1>Dziękujemy za wysłanie formularza!</h1>
    </header>
    <main>
        <p>Zostaniesz automatycznie przekierowany na stronę główną</p>
    </main>
</body>
<script>
    function redirection()
    {
        location.replace("http://www.ucidk.pl")
    }
    setTimeout("redirection()", 3000);
</script>
