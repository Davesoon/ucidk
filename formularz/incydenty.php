<?php include "validators/incydenty.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo.png">
    <title>Zgłoś bezprawie!</title>
    <link rel="stylesheet" href="../styles/forms.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <header>
        <h2>ZGŁOŚ BEZPRAWIE!</h2>
        <a href="http://ucidk.pl/"><img src="../images/logo.png"></a>
    </header>
    <main>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="formDate">
            <fieldset>
                <h4>ZGŁASZAJĄCY</h4>
                <div class="row"><?php include "fields/fullname.php"; ?></div>
                <div class="row"><?php include "fields/email-phone.php"; ?></div>
            </fieldset>
            <fieldset>
                <h4>SPRAWCA</h4>
                <div class="row"><?php include "fields/categories.php"; ?></div>
                <div class="row"><?php include "fields/suspect.php"; ?></div>
                <div class="row">
                    <?php include "fields/hqProvince.php"; ?>
                    <div class="field">Adres<?php include "fields/hqCity.php"; ?></div>
                </div>
            </fieldset>
            <fieldset>
                <h4>ZDARZENIE</h4>
                <div class="row">
                    <?php include "fields/subject.php"; ?>
                    <?php include "fields/incDate.php"; ?>
                </div>
                <div class="row">
                    <div class="fieldRow">Krótki opis<br>
                        <textarea name="desc" required title="Do 500 znaków!"><?php include "fields/desc.php"; ?>
                    </div>
                </div>
                <div class="row">
                    <?php include "fields/incProvince.php"; ?>
                    <?php include "fields/incCity.php"; ?>
                </div>
            </fieldset>
            <div class="column"><?php include "fields/checks.php"; ?></div>
            <div id="submit">
                <input type="submit" value="Wyślij FORMULARZ" name="submit" class="button">
            </div>
        </form>
    </main>
    <script type="text/javascript" src="fields/categories.js"></script>
    <script type="text/javascript" src="fields/fieldChanging.js"></script>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>
</body>
