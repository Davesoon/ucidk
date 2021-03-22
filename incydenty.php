<?php include "form/validation.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incydenty</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <header>
        <h2>ZGŁOŚ BEZPRAWIE!</h2>
        <img src="img/logo.png">
    </header>
    <main>
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date">

            <h4>OSOBA ZGŁASZAJĄCA</h4>

            <div class="row"><?php include "form/fullname.php"; ?></div>

            <div class="row"><?php include "form/email-phone.php"; ?></div>

            <select name="users" onchange="showUser(this.value)">
                <option value="">Select a person:</option>
                <option value="1">Peter Griffin</option>
                <option value="2">Lois Griffin</option>
                <option value="3">Joseph Swanson</option>
                <option value="4">Glenn Quagmire</option>
            </select>

            <div id="txtHint"><b>Person info will be listed here...</b></div>
            
            <div id="submit">
                <input type="submit" value="Wyślij FORMULARZ" name="submit">
            </div>

        </form>
    </main>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>
    <script>
        function showUser(str) 
        {
            if (str == "") 
            {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            else
            {
                document.getElementById("txtHint").innerHTML = "Hej";
            }
        }
    </script>
</body>
