<?php include "validators/zalozyciele.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dołącz do nas!</title>
    <link rel="stylesheet" href="../styles/forms.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <header>
        <h2>ZOSTAŃ ZAŁOŻYCIELEM UCiDK</h2>
        <img src="../images/logo.png">
        <h2>DOŁĄCZ DO NAS!</h2>
    </header>
    <main>
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="formDate">

            <div class="row"><?php include "../fields/fullname.php"; ?></div>

            <div class="row"><?php include "../fields/email-phone.php"; ?></div>

            <div class="row">
                <div class="field"> Województwo <?php include "../fields/hqProvince.php"; ?></div>
                <div class="field"> Gmina <?php include "../fields/hqCity.php"; ?></div>
            </div>

            <div class="row">
                <div class="fieldRow">
                    Dodatkowe informacje <?php include "../fields/desc.php"; ?>
                </div>
            </div>

            <div class="row">
                <?php include "../fields/file.php"; ?>
            </div>

            <div class="row"><?php include "../fields/checks.php"; ?></div>
            
            <div id="submit">
                <input type="submit" value="Wyślij FORMULARZ" name="submit" class="button">
            </div>

        </form>
    </main>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>
</body>
