<?php include "form/validation.php"; ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>FORMULARZ</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <form method="post" enctype="multipart/form-data">

    <p>test</p>
                    
        <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date">

        <?php include "form/name-mail-phone.php"; ?>

        <?php include "form/provinces.php"; ?>

        <?php include "form/community-info-file-regulations-captcha.php"; ?>

        <input type="submit" value="Wyślij formularz" name="submit">

    </form>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>

</body>
