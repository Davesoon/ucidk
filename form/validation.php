<?php
    session_start();
    if(isset($_POST['email']))
    {
        $everything_OK=true;

        $date = $_POST['date'];

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
            $_SESSION['e_phone']="Numer telefonu może składać się tylko z cyfr (bez kierunkowego, myślników i spacji) oraz powinien zawierać od 7 do 15 cyfr!";
        }

        $phone = "$direction $number";

        // Sprawdź poprawność województwa
        $province = $_POST['province'];
        if($province=='-- wybierz --')
        {
            $everything_OK=false;
            $_SESSION['e_province']="Wybierz województwo!";
        }

        // Sprawdź poprawność gminy
        $tmpCommunity = $_POST['community'];
        $community = filter_var($tmpCommunity, FILTER_SANITIZE_STRING);
        if(strlen($community)<3 || strlen($community)>30)
        {
            $everything_OK=false;
            $_SESSION['e_community']="Nazwa gminy musi posiadać od 3 do 30 liter!";
        }
        
        //Sprawdź poprawność informacji dodatkowej
        $tmpInfo = $_POST['info'];
        $info = filter_var($tmpInfo, FILTER_SANITIZE_STRING);
        if(strlen($info)>300)
        {
            $everything_OK=false;
            $_SESSION['e_info']="Informacja dodatkowa nie może przekroczyć 300 znaków!";
        }

        //Sprawdź plik
        #upload directory path
        $target_dir = 'uploads/';
        #file name with a random number so that similar dont get replaced
        // $file = rand(1000,10000)."-".$_FILES["file"]["name"];
        #temporary file name to store file
        $tmpFile = $_FILES["file"]["tmp_name"];
        if($tmpFile != null)
        {
            $fileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
            $file = $firstname.$lastname."-".$number.".".$fileType;

            // Check file size (<= 1 MB)
            if($_FILES["file"]["size"] > 1048576) 
            {
                $everything_OK=false;
                $_SESSION['e_file']="Plik nie może być większy niż 1 MB!";
            }
            // Allow certain file formats
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
            && $fileType != "pdf" && $fileType != "" )
            {
                $everything_OK=false;
                $_SESSION['e_file']="Plik może być tylko w formacie JPG, JPEG, PNG oraz PDF!";
            }
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
                $result = $connection->query("SELECT id FROM ucidk_members WHERE email='$email'");
                if(!$result) throw new Exception($connection->error);

                $how_many_emails = $result->num_rows;
                if($how_many_emails>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_email']="Podany adres e-mail jest już w bazie!";
                }

                //czy telefon juz istnieje?
                $result = $connection->query("SELECT id FROM ucidk_members WHERE phone='$phone'");
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
                    #TO move the uploaded file to specific location
                    move_uploaded_file($tmpFile, $target_dir.$file);

                    #sql query to insert into database
                    $sql = "INSERT INTO ucidk_members VALUES(NULL, '$date', '$firstname', '$lastname', '$email', '$phone', '$province', '$community', '$info', '$file')";

                    if(mysqli_query($connection,$sql))
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
