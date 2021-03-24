<?php include "validators/dolacz.php"; ?>
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
        <h2>ZOSTAŃ ZAŁOŻYCIELEM UCiDK</h2>
        <img src="images/logo.png">
        <h2>DOŁĄCZ DO NAS!</h2>
    </header>
    <main>
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date">

            <div class="row"><?php include "fields/fullname.php"; ?></div>

            <div class="row"><?php include "fields/email-phone.php"; ?></div>

            <div class="row"><?php include "fields/province-community.php"; ?></div>

            <?php include "fields/file-info.php"; ?>

            <div class="row"><?php include "fields/regulations-recaptcha.php"; ?></div>
            
            <div id="submit">
                <input type="submit" value="Wyślij FORMULARZ" name="submit" class="button">
            </div>

        </form>
    </main>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>
</body>
