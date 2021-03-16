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
        <h1>Dołącz do nas!</h1>
    </header>
    <main>
        <div class="space"></div>

        <form method="post" enctype="multipart/form-data">

            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date">

            <?php include "form/name-mail-phone.php"; ?>

            <?php include "form/provinces.php"; ?>

            <?php include "form/community-info-file-regulations-captcha.php"; ?>
            
            <div id="submit">
                <input type="submit" value="Wyślij formularz" name="submit">
            </div>

        </form>
        <div class="space"></div>

    </main>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>
</body>
