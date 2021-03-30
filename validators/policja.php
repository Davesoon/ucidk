<?php
    session_start();
    if(isset($_POST['email']))
    {
        $everything_OK=true;

        $formDate = $_POST['formDate'];

        //Sprawdź poprawność imienia
        $tmpFirstname = $_POST['firstname'];
        $firstname = filter_var($tmpFirstname, FILTER_SANITIZE_STRING);
        if(strlen($firstname)<3 || strlen($firstname)>20)
        {
            $everything_OK=false;
            $_SESSION['e_firstname']="Imię musi posiadać od 3 do 20 liter!";
        }
        //Sprawdź poprawność nazwiska
        $tmpLastname = $_POST['lastname'];
        $lastname = filter_var($tmpLastname, FILTER_SANITIZE_STRING);
        if(strlen($lastname)<3 || strlen($lastname)>30)
        {
            $everything_OK=false;
            $_SESSION['e_lastname']="Nazwisko musi posiadać od 3 do 30 liter!";
        }

        // Sprawdź poprawność adresu email
        $tmpEmail = $_POST['email'];
        $email = filter_var($tmpEmail, FILTER_SANITIZE_EMAIL);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)==false || $email!=$tmpEmail)
        {
            $everything_OK=false;
            $_SESSION['e_email']="Podaj poprawny adres e-mail!";
        }

        // Sprawdź poprawność telefonu
        $tmpDirection = $_POST['direction'];
        $direction = filter_var($tmpDirection, FILTER_SANITIZE_STRING);

        $tmpNumber = $_POST['phone'];
        $number = filter_var($tmpNumber, FILTER_SANITIZE_STRING);
        if(ctype_digit($number)==false || strlen($number)<7 || strlen($number)>15)
        {
            $everything_OK=false;
            $_SESSION['e_phone']="Numer telefonu może składać się tylko z cyfr (bez myślników i spacji) oraz powinien zawierać od 7 do 15 cyfr!";
        }

        $phone = "$direction $number";

        //Sprawdź poprawność policjanta
        $tmpPoliceman = $_POST['policeman'];
        $policeman = filter_var($tmpPoliceman, FILTER_SANITIZE_STRING);
        if(strlen($policeman)<6 || strlen($policeman)>40)
        {
            $everything_OK=false;
            $_SESSION['e_policeman']="Pole może zawierać od 6 do 40 znaków!";
        }

        //Sprawdź poprawność Id policjanta
        $tmpPoliceId = $_POST['policeId'];
        $policeId = filter_var($tmpPoliceId, FILTER_SANITIZE_STRING);
        if(strlen($policeId)<6 || strlen($policeId)>40)
        {
            $everything_OK=false;
            $_SESSION['e_policeId']="Pole może zawierać od 6 do 40 znaków!";
        }

        // Sprawdź poprawność komendy
        $hq = $_POST['hq'];
        if($hq=='-- wybierz --')
        {
            $everything_OK=false;
            $_SESSION['e_hq']="Wybierz komende!";
        }

        // Sprawdź poprawność miejscowości zdarzenia
        $tmpIncCity = $_POST['incCity'];
        $incCity = filter_var($tmpIncCity, FILTER_SANITIZE_STRING);
        if(strlen($incCity)<3 || strlen($incCity)>30)
        {
            $everything_OK=false;
            $_SESSION['e_incCity']="Nazwa miejscowości musi posiadać od 3 do 30 liter!";
        }

        // Sprawdź poprawność miejscowości komendy
        $tmpHqCity = $_POST['hqCity'];
        $hqCity = filter_var($tmpHqCity, FILTER_SANITIZE_STRING);
        if(strlen($hqCity)<3 || strlen($hqCity)>30)
        {
            $everything_OK=false;
            $_SESSION['e_hqCity']="Nazwa miejscowości musi posiadać od 3 do 30 liter!";
        }

        // Sprawdź poprawność województwa zdarzenia
        $incProvince = $_POST['incProvince'];
        if($incProvince=='-- wybierz --')
        {
            $everything_OK=false;
            $_SESSION['e_incProvince']="Wybierz województwo!";
        }

        // Sprawdź poprawność województwa komendy
        $hqProvince = $_POST['hqProvince'];
        if($hqProvince=='-- wybierz --')
        {
            $everything_OK=false;
            $_SESSION['e_hqProvince']="Wybierz województwo!";
        }        
        
        //Sprawdź poprawność informacji dodatkowej
        $tmpDesc = $_POST['desc'];
        $desc = filter_var($tmpDesc, FILTER_SANITIZE_STRING);
        if(strlen($desc)>300)
        {
            $everything_OK=false;
            $_SESSION['e_desc']="Pole nie może przekroczyć 300 znaków!";
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
        $_SESSION['fr_direction'] = $direction;
        $_SESSION['fr_phone'] = $number;
        $_SESSION['fr_policeman'] = $policeman;
        $_SESSION['fr_policeId'] = $policeId;
        $_SESSION['fr_hq'] = $hq;
        $_SESSION['fr_incCity'] = $incCity;
        $_SESSION['fr_hqCity'] = $hqCity;
        $_SESSION['fr_incProvince'] = $incProvince;
        $_SESSION['fr_hqProvince'] = $hqProvince;
        $_SESSION['fr_desc'] = $desc;
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
                if($everything_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone!
                    #sql query to insert into database
                    $sql = "INSERT INTO ucidk_members VALUES(NULL, '$date', '$firstname', '$lastname', '$email', '$phone', '$province', '$community', '$info', '$file')";

                    if(mysqli_query($connection,$sql))
                    {
                        $_SESSION['sent']=true;
                        header('Location: dziekujemy.php');
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
