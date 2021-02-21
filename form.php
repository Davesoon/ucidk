<?php
    session_start();
    if(isset($_POST['email']))
    {
        //Udana walidacja? Załóżmy, że tak!
        $everything_OK=true;

        //Sprawdź poprawność imienia
        $firstname = $_POST['firstname'];

        //Sprawdzenie długości imienia
        if((strlen($firstname)<3) || (strlen($firstname)>20))
        {
            $everything_OK=false;
            $_SESSION['e_firstname']="Imię musi posiadać od 3 do 20 znaków!";
        }

        if($everything_OK==true)
        {
            //Hurra, wszystkie testy zaliczone!
            echo "Udana walidacja!"; exit();
        }
    }

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>FORMULARZ</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <style>
        .error
        {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form method="post">
        Imię: <input type="text" name="firstname"><br>
        <?php
            if(isset($_SESSION['e_firstname']))
            {
                echo '<div class="error">'.$_SESSION['e_firstname'].'</div>';
                unset($_SESSION['e_firstname']);
            }
        ?>

        Nazwisko: <input type="text" name="lastname"><br>
        E-mail: <input type="text" name="email"><br>
        Telefon: <input type="text" name="phone"><br>
        Dodatkowe informacje: <input type="text" name="info"><br>
        <label>
            <input type="checkbox" name="regulations"> Akceptuję regulamin
        </label>
        <button class="g-recaptcha" 
                data-sitekey="reCAPTCHA_site_key" 
                data-callback='onSubmit' 
                data-action='submit'>Submit
        </button><br>
        <input type="submit" value="Wyślij formularz">

    </form>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>

</body>