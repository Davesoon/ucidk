<?php include "validators/dolacz.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Policja</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <header>
        <h2>ZGŁOŚ BEZPRAWIE!</h2>
        <img src="images/logo.png">
    </header>
    <main>
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date">

            <h4>OSOBA ZGŁASZAJĄCA</h4>

            <div class="row"><?php include "fields/fullname.php"; ?></div>

            <div class="row"><?php include "fields/email-phone.php"; ?></div>

            <h4>OPIS ZDARZENIA</h4>

            <div class="row"><?php include "fields/province-community.php"; ?></div>
            
            <div class="row"><?php include "fields/policeman.php"; ?></div>

            <div class="row">
                <?php include "fields/info.php"; ?>
                <div class="column">
                    <?php include "fields/place-checks.php"; ?>
                </div>
            </div>
            
            <div id="submit">
                <input type="submit" value="Wyślij FORMULARZ" name="submit" class="button">
            </div>

        </form>
    </main>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>
</body>
