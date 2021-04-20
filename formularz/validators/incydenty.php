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
        $tmpPhone = $_POST['phone'];
        $phone = filter_var($tmpPhone, FILTER_SANITIZE_STRING);
        if (strlen($phone)<11 || strlen($phone)>17)
        {
            $everything_OK=false;
            $_SESSION['e_phone']="Od 11 do 17 cyfr!";
        }        

        //Sprawdź poprawność oskarżonego
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

        // Sprawdź poprawność instytucji
        $category = $_POST['category'];
        if($category == '-- wybierz --')
        {
            $everything_OK=false;
            $_SESSION['e_category']="Wybierz podmiot!";
        }

        // Sprawdź poprawność siedziby
        $subCategory = $_POST['subCategory'];
        if($subCategory=='-- wybierz --')
        {
            $everything_OK=false;
            $_SESSION['e_subCategory']="Wybierz siedzibę!";
        }

        // Sprawdź poprawność województwa siedziby
        $hqProvince = $_POST['hqProvince'];
        if($hqProvince=='-- wybierz --')
        {
            $everything_OK=false;
            $_SESSION['e_hqProvince']="Wybierz województwo!";
        }

        // Sprawdź poprawność miejscowości siedziby
        $tmpHqCity = $_POST['hqCity'];
        $hqCity = filter_var($tmpHqCity, FILTER_SANITIZE_STRING);
        if(strlen($hqCity)<3 || strlen($hqCity)>50)
        {
            $everything_OK=false;
            $_SESSION['e_hqCity']="Od 3 do 50 znaków!";
        }

        //Sprawdź poprawność tematu
        $tmpSubject = $_POST['subject'];
        $subject = filter_var($tmpSubject, FILTER_SANITIZE_STRING);
        if(strlen($subject)<5 || strlen($subject)>40)
        {
            $everything_OK=false;
            $_SESSION['e_subject']="Od 5 do 40 znaków!";
        }

        // Sprawdź poprawność daty zdarzenia
        $incDate = $_POST['incDate'];
        if($incDate > date("Y-m-d"))
        {
            $everything_OK=false;
            $_SESSION['e_incDate']="Wykracza poza dzisiejszą datę!";
        }

        //Sprawdź poprawność opisu
        $tmpDesc = $_POST['desc'];
        $desc = filter_var($tmpDesc, FILTER_SANITIZE_STRING);
        if(strlen($desc)<5 || strlen($desc)>1000)
        {
            $everything_OK=false;
            $_SESSION['e_desc']="Od 5 do 1000 znaków!";
        }

        // Sprawdź poprawność województwa zdarzenia
        $incProvince = $_POST['incProvince'];
        if($incProvince=='-- wybierz --')
        {
            $everything_OK=false;
            $_SESSION['e_incProvince']="Wybierz województwo!";
        }

        // Sprawdź poprawność miejscowości zdarzenia
        $tmpIncCity = $_POST['incCity'];
        $incCity = filter_var($tmpIncCity, FILTER_SANITIZE_STRING);
        if(strlen($incCity)<3 || strlen($incCity)>50)
        {
            $everything_OK=false;
            $_SESSION['e_incCity']="Od 3 do 50 znaków!";
        }        
  
        //Sprawdź checkboxa
        if(!isset($_POST['regulations']))
        {
            $everything_OK=false;
            $_SESSION['e_regulations']="Potwierdź akceptację regulaminu!";
        }

        // bot or not?
        include "fields/reCaptcha.php";

        //Zapamiętaj wprowadzone dane
        $_SESSION['fr_formDate'] = $formDate;
        $_SESSION['fr_suspect'] = $suspect;
        $_SESSION['fr_suspectId'] = $suspectId;
        $_SESSION['fr_category'] = $category;
        $_SESSION['fr_subCategory'] = $subCategory;
        $_SESSION['fr_hqProvince'] = $hqProvince;
        $_SESSION['fr_hqCity'] = $hqCity;
        $_SESSION['fr_subject'] = $subject;
        $_SESSION['fr_incDate'] = $incDate;
        $_SESSION['fr_desc'] = $desc;
        $_SESSION['fr_incProvince'] = $incProvince;
        $_SESSION['fr_incCity'] = $incCity;
        $_SESSION['fr_firstname'] = $firstname;
        $_SESSION['fr_lastname'] = $lastname;
        $_SESSION['fr_email'] = $email;
        $_SESSION['fr_phone'] = $phone;
        if(isset($_POST['regulations'])) $_SESSION['fr_regulations'] = true;

        require_once "../connect.php";
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
                    $sql = "INSERT INTO incidents VALUES(NULL, '$formDate', '$suspect', '$suspectId', '$category', '$subCategory', '$hqProvince', '$hqCity', '$subject', '$incDate', '$desc', '$incProvince', '$incCity', '$firstname', '$lastname', '$email', '$phone')";

                    if(mysqli_query($connection,$sql))
                    {
                        $_SESSION['sent']=true;
                        header('Location: dziekujemy');
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
