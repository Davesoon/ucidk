<?php include "form/validation.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dołącz do nas!</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <header>
        <img src="img/logo.png">
        <h1>Dołącz do NAS!</h1>
    </header>
    <main>
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date">

            <div class="row"><?php include "form/fullname.php"; ?></div>

            <div class="row"><?php include "form/email-phone.php"; ?></div>

            <div class="row"><?php include "form/province-community.php"; ?></div>

            <div class="row"><?php include "form/file-info.php"; ?></div>

            <div class="row"><?php include "form/regulations-recaptcha.php"; ?></div>
            
            <div id="submit">
                <input type="submit" value="Wyślij FORMULARZ" name="submit">
            </div>

        </form>
    </main>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>
</body>
