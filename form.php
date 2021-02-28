<?php
    session_start();
    if(isset($_POST['email']))
    {
        //Udana walidacja? Załóżmy, że tak!
        $everything_OK=true;

        $date = $_POST['date'];

        //Sprawdź poprawność imienia
        $firstname = $_POST['firstname'];
        if(strlen($firstname)<3 || strlen($firstname)>20)
        {
            $everything_OK=false;
            $_SESSION['e_firstname']="Imię musi posiadać od 3 do 20 znaków!";
        }
        //Sprawdź poprawność nazwiska
        $lastname = $_POST['lastname'];
        if(strlen($lastname)<3 || strlen($lastname)>30)
        {
            $everything_OK=false;
            $_SESSION['e_lastname']="Nazwisko musi posiadać od 3 do 30 znaków!";
        }

        // Sprawdź poprawność adresu email
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || $emailB!=$email)
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
        if(ctype_digit($phone)==false || strlen($phone)<7 || strlen($phone)>15)
        {
            $everything_OK=false;
            $_SESSION['e_phone']="Numer telefonu może składać się tylko z cyfr (bez kierunkowego, myślników i spacji) oraz powinien zawierać od 7 do 15 cyfr!";
        }

        // Sprawdź poprawność województwa
        $province = $_POST['province'];
        if($province=='-- wybierz --')
        {
            $everything_OK=false;
            $_SESSION['e_province']="Wybierz województwo!";
        }

        // Sprawdź poprawność gminy
        $community = $_POST['community'];
        if(strlen($community)<3 || strlen($community)>30)
        {
            $everything_OK=false;
            $_SESSION['e_community']="Nazwa gminy powinna zawierać od 3 do 30 liter!";
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

        //Zapamiętaj wprowadzone dane
        $_SESSION['fr_firstname'] = $firstname;
        $_SESSION['fr_lastname'] = $lastname;
        $_SESSION['fr_email'] = $email;
        $_SESSION['fr_phone'] = $phone;
        $_SESSION['fr_province'] = $province;
        $_SESSION['fr_community'] = $community;
        $_SESSION['fr_info'] = $info;
        if(isset($_POST['regulations'])) $_SESSION['fr_regulations'] = true;

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                //czy email juz isnieje?
                $result = $connection->query("SELECT id FROM members WHERE email='$email'");
                if(!$result) throw new Exception($connection->error);

                $how_many_emails = $result->num_rows;
                if($how_many_emails>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_email']="Podany adres e-mail jest już w bazie!";
                }

                //czy telefon juz isnieje?
                $result = $connection->query("SELECT id FROM members WHERE phone='$phone'");
                if(!$result) throw new Exception($connection->error);
                
                $how_many_phones = $result->num_rows;
                if($how_many_phones>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_phone']="Podany numer telefonu jest już w bazie!";
                }

                if($everything_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone!
                    if($connection->query("INSERT INTO members VALUES(NULL, '$date', '$firstname', '$lastname', '$email', '$phone', '$province', '$community', '$info', NULL)"))
                    {
                        $_SESSION['sent']=true;
                        header('Location: welcome.php');
                    }
                    else
                    {
                        throw new Exception($connection->error);
                    }
                }        

                $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            // echo '<br>Informacja developerska: '.$e;
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
    
        <input type="hidden" value="<?php echo date('d.m.Y'); ?>" name="date">

        Imię: <input type="text" value="<?php
        if(isset($_SESSION['fr_firstname']))
        {
            echo $_SESSION['fr_firstname'];
            unset($_SESSION['fr_firstname']);
        }
        ?>" name="firstname"><br>
        <?php
            if(isset($_SESSION['e_firstname']))
            {
                echo '<div class="error">'.$_SESSION['e_firstname'].'</div>';
                unset($_SESSION['e_firstname']);
            }
        ?>

        Nazwisko: <input type="text" value="<?php
        if(isset($_SESSION['fr_lastname']))
        {
            echo $_SESSION['fr_lastname'];
            unset($_SESSION['fr_lastname']);
        }
        ?>" name="lastname"><br>
        <?php
            if(isset($_SESSION['e_lastname']))
            {
                echo '<div class="error">'.$_SESSION['e_lastname'].'</div>';
                unset($_SESSION['e_lastname']);
            }
        ?>

        E-mail: <input type="email" value="<?php
        if(isset($_SESSION['fr_email']))
        {
            echo $_SESSION['fr_email'];
            unset($_SESSION['fr_email']);
        }
        ?>" name="email"><br>
        <?php
            if(isset($_SESSION['e_email']))
            {
                echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                unset($_SESSION['e_email']);
            }
        ?>

        Telefon: <input type="tel" value="<?php
        if(isset($_SESSION['fr_phone']))
        {
            echo $_SESSION['fr_phone'];
            unset($_SESSION['fr_phone']);
        }
        ?>" name="phone"><br>
        <?php
            if(isset($_SESSION['e_phone']))
            {
                echo '<div class="error">'.$_SESSION['e_phone'].'</div>';
                unset($_SESSION['e_phone']);
            }
        ?>

        Województwo: <select name="province" <?php error_reporting(0); ?>>
            <option
                <?php  if ($_SESSION['fr_province'] == "-- wybierz --") echo 'selected="selected" ';?>
            >-- wybierz --</option>
            <option
                <?php if ($_SESSION['fr_province'] == "dolnośląskie") echo 'selected="selected" ';?>
            >dolnośląskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "kujawsko-pomorskie") echo 'selected="selected" ';?>
            >kujawsko-pomorskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "lubelskie") echo 'selected="selected" ';?>
            >lubelskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "lubuskie") echo 'selected="selected" ';?>
            >lubuskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "łódzkie") echo 'selected="selected" ';?>
            >łódzkie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "małopolskie") echo 'selected="selected" ';?>
            >małopolskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "mazowieckie") echo 'selected="selected" ';?>
            >mazowieckie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "opolskie") echo 'selected="selected" ';?>
            >opolskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "podkarpackie") echo 'selected="selected" ';?>
            >podkarpackie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "podlaskie") echo 'selected="selected" ';?>
            >podlaskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "pomorskie") echo 'selected="selected" ';?>
            >pomorskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "śląskie") echo 'selected="selected" ';?>
            >śląskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "świętokrzyskie") echo 'selected="selected" ';?>
            >świętokrzyskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "warmińsko-mazurskie") echo 'selected="selected" ';?>
            >warmińsko-mazurskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "wielkopolskie") echo 'selected="selected" ';?>
            >wielkopolskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "zachodniopomorskie") echo 'selected="selected" ';?>
            >zachodniopomorskie</option>
        </select><br>
        <?php
                if(isset($_SESSION['e_province']))
                {
                    echo '<div class="error">'.$_SESSION['e_province'].'</div>';
                    unset($_SESSION['e_province']);
                }
            ?>

        Gmina: <input type="text" value="<?php
        if(isset($_SESSION['fr_community']))
        {
            echo $_SESSION['fr_community'];
            unset($_SESSION['fr_community']);
        }
        ?>" name="community"><br>
        <?php
            if(isset($_SESSION['e_community']))
            {
                echo '<div class="error">'.$_SESSION['e_community'].'</div>';
                unset($_SESSION['e_community']);
            }
        ?>

        Dodatkowe informacje: <textarea value="<?php
        if(isset($_SESSION['fr_info']))
        {
            echo $_SESSION['fr_info'];
            unset($_SESSION['fr_info']);
        }
        ?>" name="info"></textarea><br>
        <?php
            if(isset($_SESSION['e_info']))
            {
                echo '<div class="error">'.$_SESSION['e_info'].'</div>';
                unset($_SESSION['e_info']);
            }
        ?>

        <label>
            <input type="checkbox" name="regulations" <?php
            if(isset($_SESSION['fr_regulations']))
            {
                echo "checked";
                unset($_SESSION['fr_regulations']);
            }
            ?>> Akceptuję regulamin
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