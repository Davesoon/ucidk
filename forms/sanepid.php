<?php include "../validators/policja.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Policja</title>
    <link rel="stylesheet" href="../styles/forms.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <header>
        <h2>ZGŁOŚ BEZPRAWIE!</h2>
        <img src="../images/logo.png">
    </header>
    <main>
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="formDate">

            <h4>OSOBA ZGŁASZAJĄCA</h4>

            <div class="row"><?php include "../fields/fullname.php"; ?></div>

            <div class="row"><?php include "../fields/email-phone.php"; ?></div>

            <h4>ZGŁOSZENIE POLICJANTA</h4>

            <div class="row"><?php include "../fields/policeman.php"; ?></div>

            <div class="row">
                <?php include "../fields/incDate.php"; ?>
                <?php include "../fields/hqSanepid.php"; ?>
            </div>

            <div class="row">
                <?php include "../fields/incCity.php"; ?>
                <div class="field">Miejscowość siedziby<?php include "../fields/hqCity.php"; ?></div>
            </div>

            <div class="row">
                <div class="field"><?php include "../fields/incProvince.php"; ?></div>
                <div class="field">Województwo siedziby<?php include "../fields/hqProvince.php"; ?></div>
            </div>

            <div class="row">
                <div class="fieldRow">Opis zdarzenia<?php include "../fields/desc.php"; ?></div>
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
