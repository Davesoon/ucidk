<?php
    session_start();
    if(isset($_POST['email']))
    {
        //Udana walidacja? Załóżmy, że tak!
        $everything_OK=true;
        //Sprawdź poprawność imienia
        $firstname = $_POST['firstname'];
        if((strlen($firstname)<3) || (strlen($firstname)>20))
        {
            $everything_OK=false;
            $_SESSION['e_firstname']="Imię musi posiadać od 3 do 20 znaków!";
        }
        //Sprawdź poprawność nazwiska
        $lastname = $_POST['lastname'];
        if((strlen($lastname)<3) || (strlen($lastname)>30))
        {
            $everything_OK=false;
            $_SESSION['e_lastname']="Nazwisko musi posiadać od 3 do 30 znaków!";
        }

        // Sprawdź poprawność adresu email
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
        {
            $everything_OK=false;
            $_SESSION['e_email']="Podaj poprawny adres e-mail!";
        }
        // if(ctype_alnum($email)==false)
        // {
        //     $everything_OK=false;
        //     $_SESSION['e_email']="Adres e-mail może składać się tylko z liter i cyfr (bez polskich znaków)";
        // }

        // Sprawdź poprawność telefonu
        $phone = $_POST['phone'];
        if((ctype_digit($phone)==false) || ((strlen($phone)<7) || (strlen($phone)>15)))
        {
            $everything_OK=false;
            $_SESSION['e_phone']="Numer telefonu może składać się tylko z cyfr (bez kierunkowego, myślników i spacji) oraz powinien zawierać od 7 do 15 cyfr!";
        }

        //Sprawdź poprawność informacji dodatkowej
        $info = $_POST['info'];
        if(strlen($info)>300)
        {
            $everything_OK=false;
            $_SESSION['e_info']="Informacja dodatkowa nie może przekroczyć 300 znaków!";
        }

        //Sprawdź checkboxa
        if(!isset($_POST['regulations']))
        {
            $everything_OK=false;
            $_SESSION['e_regulations']="Potwierdź akceptację regulaminu!";
        }

        //bot or not?
        // $secret = "";
        // $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&respone='.$_POST['g-recaptcha-response']);
        // $response = json_decode($verify);
        // if($response->success==false)
        // {
        //     $everything_OK=false;
        //     $_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
        // }

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
        <?php
            if(isset($_SESSION['e_lastname']))
            {
                echo '<div class="error">'.$_SESSION['e_lastname'].'</div>';
                unset($_SESSION['e_lastname']);
            }
        ?>

        E-mail: <input type="text" name="email"><br>
        <?php
            if(isset($_SESSION['e_email']))
            {
                echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                unset($_SESSION['e_email']);
            }
        ?>

        Telefon: <input type="text" name="phone"><br>
        <?php
            if(isset($_SESSION['e_phone']))
            {
                echo '<div class="error">'.$_SESSION['e_phone'].'</div>';
                unset($_SESSION['e_phone']);
            }
        ?>

        Dodatkowe informacje: <input type="text" name="info"><br>
        <?php
            if(isset($_SESSION['e_info']))
            {
                echo '<div class="error">'.$_SESSION['e_info'].'</div>';
                unset($_SESSION['e_info']);
            }
        ?>

        <label>
            <input type="checkbox" name="regulations"> Akceptuję regulamin
        </label>
        <?php
            if(isset($_SESSION['e_regulations']))
            {
                echo '<div class="error">'.$_SESSION['e_regulations'].'</div>';
                unset($_SESSION['e_regulations']);
            }
        ?>

        <button class="g-recaptcha" 
                data-sitekey="reCAPTCHA_site_key" 
                data-callback='onSubmit' 
                data-action='submit'>Submit
        </button><br>
        <!-- <?php
            if(isset($_SESSION['e_bot']))
            {
                echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                unset($_SESSION['e_bot']);
            }
        ?> -->

        <input type="submit" value="Wyślij formularz">

    </form>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>

</body>