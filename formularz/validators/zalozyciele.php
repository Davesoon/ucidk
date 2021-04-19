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

        // Sprawdź poprawność województwa
        $hqProvince = $_POST['hqProvince'];
        if($hqProvince=='-- wybierz --')
        {
            $everything_OK=false;
            $_SESSION['e_hqProvince']="Wybierz województwo!";
        }

        // Sprawdź poprawność gminy
        $tmpHqCity = $_POST['hqCity'];
        $hqCity = filter_var($tmpHqCity, FILTER_SANITIZE_STRING);
        if(strlen($hqCity)<3 || strlen($hqCity)>30)
        {
            $everything_OK=false;
            $_SESSION['e_hqCity']="Od 3 do 30 liter!";
        }
        
        //Sprawdź poprawność informacji dodatkowej
        $tmpDesc = $_POST['desc'];
        $desc = filter_var($tmpDesc, FILTER_SANITIZE_STRING);
        if(strlen($desc)>300)
        {
            $everything_OK=false;
            $_SESSION['e_desc']="Do 300 znaków!";
        }

        //Sprawdź plik
        $target_dir = '../uploads/';
        $tmpFile = $_FILES["file"]["tmp_name"];
        if($tmpFile != null)
        {
            $filename = uniqid().rand(1000000,9999999);
            $fileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
            $file = $filename.".".$fileType;

            // Check file size (<= 2 MB)
            if($_FILES["file"]["size"] > 2097152)
            {
                $everything_OK=false;
                $_SESSION['e_file']="Plik nie może być większy niż 2 MB!";
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

        // bot or not?
        include "../redirects/reCaptcha.php";

        //Zapamiętaj wprowadzone dane
        $_SESSION['fr_firstname'] = $firstname;
        $_SESSION['fr_lastname'] = $lastname;
        $_SESSION['fr_email'] = $email;
        $_SESSION['fr_phone'] = $phone;
        $_SESSION['fr_hqProvince'] = $hqProvince;
        $_SESSION['fr_hqCity'] = $hqCity;
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
                //czy email juz isnieje?
                $result = $connection->query("SELECT id FROM members WHERE email='$email'");
                if(!$result) throw new Exception($connection->error);

                $how_many_emails = $result->num_rows;
                if($how_many_emails>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_email']="Podany adres e-mail jest już w bazie!";
                }

                //czy telefon juz istnieje?
                $result = $connection->query("SELECT id FROM members WHERE phone='$phone'");
                if(!$result) throw new Exception($connection->error);
                
                $how_many_phones = $result->num_rows;
                if($how_many_phones>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_phone']="Podany numer telefonu jest już w bazie!";
                }

                //czy plik juz isnieje?
                $result = $connection->query("SELECT id FROM members WHERE file='$file'");
                if(!$result) throw new Exception($connection->error);
            
                $how_many_files = $result->num_rows;
                if($how_many_files>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_file']="Problem z załadowaniem pliku, spróbuj ponownie!";
                }

                if($everything_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone!
                    #TO move the uploaded file to specific location
                    move_uploaded_file($tmpFile, $target_dir.$file);

                    #sql query to insert into database
                    $sql = "INSERT INTO members VALUES(NULL, '$formDate', '$firstname', '$lastname', '$email', '$phone', '$hqProvince', '$hqCity', '$desc', '$file')";

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
