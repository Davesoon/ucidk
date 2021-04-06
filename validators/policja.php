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
            $_SESSION['e_firstname']="Od 3 do 20 liter!";
        }
        //Sprawdź poprawność nazwiska
        $tmpLastname = $_POST['lastname'];
        $lastname = filter_var($tmpLastname, FILTER_SANITIZE_STRING);
        if(strlen($lastname)<3 || strlen($lastname)>30)
        {
            $everything_OK=false;
            $_SESSION['e_lastname']="Od 3 do 30 liter!";
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

        $tmpNumber = $_POST['number'];
        $number = filter_var($tmpNumber, FILTER_SANITIZE_STRING);
        if(ctype_digit($number)==false)
        {
            $everything_OK=false;
            $_SESSION['e_number']="Tylko cyfry, bez myślników i spacji!";
        }
        else if (strlen($number)<7 || strlen($number)>15)
        {
            $everything_OK=false;
            $_SESSION['e_number']="Od 7 do 15 cyfr!";
        }

        $phone = "$direction $number";

        //Sprawdź poprawność policjanta
        $tmpSuspect = $_POST['suspect'];
        $suspect = filter_var($tmpSuspect, FILTER_SANITIZE_STRING);
        if(strlen($suspect)<6 || strlen($suspect)>50)
        {
            $everything_OK=false;
            $_SESSION['e_suspect']="Od 6 do 50 znaków!";
        }

        //Sprawdź poprawność Id policjanta
        $tmpSuspectId = $_POST['suspectId'];
        $suspectId = filter_var($tmpSuspectId, FILTER_SANITIZE_STRING);
        if(strlen($suspectId)>40)
        {
            $everything_OK=false;
            $_SESSION['e_suspectId']="Do 40 znaków!";
        }

        // Sprawdź poprawność daty zdarzenia
        $incDate = $_POST['incDate'];
        if($incDate > date("Y-m-d"))
        {
            $everything_OK=false;
            $_SESSION['e_incDate']="Wykracza poza dzisiejszą datę!";
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
            $_SESSION['e_incCity']="Od 3 do 30 liter!";
        }

        // Sprawdź poprawność miejscowości komendy
        $tmpHqCity = $_POST['hqCity'];
        $hqCity = filter_var($tmpHqCity, FILTER_SANITIZE_STRING);
        if(strlen($hqCity)<3 || strlen($hqCity)>30)
        {
            $everything_OK=false;
            $_SESSION['e_hqCity']="Od 3 do 30 liter!";
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
        if(strlen($desc)>1000)
        {
            $everything_OK=false;
            $_SESSION['e_desc']="Do 1000 znaków!";
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
        $_SESSION['fr_number'] = $number;
        $_SESSION['fr_suspect'] = $suspect;
        $_SESSION['fr_suspectId'] = $suspectId;
        $_SESSION['fr_incDate'] = $incDate;
        $_SESSION['fr_hq'] = $hq;
        $_SESSION['fr_incCity'] = $incCity;
        $_SESSION['fr_hqCity'] = $hqCity;
        $_SESSION['fr_incProvince'] = $incProvince;
        $_SESSION['fr_hqProvince'] = $hqProvince;
        $_SESSION['fr_desc'] = $desc;
        if(isset($_POST['regulations'])) $_SESSION['fr_regulations'] = true;

        require_once "../redirects/connect.php";
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
                    $sql = "INSERT INTO ucidk_policja VALUES(NULL, '$formDate', '$firstname', '$lastname', '$email', '$phone', '$suspect', '$suspectId', '$incDate', '$hq', '$incCity', '$hqCity', '$incProvince', '$hqProvince', '$desc')";

                    if(mysqli_query($connection,$sql))
                    {
                        $_SESSION['sent']=true;
                        header('Location: ../dziekujemy.php');
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
            echo '<br>Informacja developerska: '.$e;
        }
    }

?>
