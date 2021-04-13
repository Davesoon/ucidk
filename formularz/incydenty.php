<?php include "validators/incydenty.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <legend align="center"><h4>SPRAWCA</h4></legend>

                <div class="row"><?php include "../fields/suspect.php"; ?></div>

                <div class="row">
                    <div class="field">Instytucja<select name="institution" id="institution"><option>-- wybierz --</option></select></div>
                    <div class="field">Siedziba<select name="hq" id="hq"></select></div>
                </div>

                <div class="row">
                    <?php include "../fields/hqProvince.php"; ?>
                    <div class="field">Miejscowość<?php include "../fields/hqCity.php"; ?></div>
                </div>

            </fieldset>

            <fieldset>
                <legend align="center"><h4>ZDARZENIE</h4></legend>

                <div class="row">
                    <?php include "../fields/subject.php"; ?>
                    <?php include "../fields/incDate.php"; ?>
                </div>

                <div class="row">
                    <div class="fieldRow">Opis<?php include "../fields/desc.php"; ?></div>
                </div>

                <div class="row">
                    <?php include "../fields/incProvince.php"; ?>
                    <?php include "../fields/incCity.php"; ?>
                </div>

            </fieldset>

            <fieldset>
                <legend align="center"><h4>POSZKODOWANY</h4></legend>
                <div class="row"><?php include "../fields/fullname.php"; ?></div>
                <div class="row"><?php include "../fields/email-phone.php"; ?></div>
            </fieldset>
            
            <div class="row"><?php include "../fields/checks.php"; ?></div>

            <div id="submit">
                <input type="submit" value="Wyślij FORMULARZ" name="submit" class="button">
            </div>


        </form>
    </main>
    <script language="javascript" type="text/javascript">  
        var mList = {
            Policja : ['-- wybierz --', 'Komenda Główna', 'Komenda Stołeczna', 'Komenda Wojewódzka', 'Komenda Miejska', 'Komenda Powiatowa', 'Posterunek Policji'],
            Sanepid :  ['-- wybierz --', 'Powiatowa Stacja Sanitarno - Epidemiologiczna', 'Wojewódzka Stacja Sanitarno - Epidemiologiczna', 'Główny Inspektorat Sanitarny'],
            Urząd :  ['-- wybierz --', 'Urząd Miasta', 'Urząd Miasta i Gminy', 'Urząd Gminy', 'Starostwo Powiatowe '],
            Sąd :  ['-- wybierz --', 'Sąd Rejonowy', 'Sąd Okręgowy', 'Wojewódzki Sąd Administracyjny', 'Naczelny Sąd Administracyjny', 'Sąd Apelacyjny', 'Sąd Najwyższy'],
            Prokuratura : ['-- wybierz --', 'Prokuratura Rejonowa', 'Prokuratura Okręgowa', 'Prokuratura Apelacyjna', 'Prokuratura Krajowa '],
            Firma :  ['----'],
            Sklep :  ['----'],
            Inne :  ['----']
        };

        el_parent = document.getElementById("institution");
        el_child = document.getElementById("hq");

        for (key in mList) {
            el_parent.innerHTML = el_parent.innerHTML + '<option>'+ key +'</option>';
        }

        el_parent.addEventListener('change', function populate_child(e){
            el_child.innerHTML = '';
            itm = e.target.value;
            if(itm in mList){
                    for (i = 0; i < mList[itm].length; i++) {
                        el_child.innerHTML = el_child.innerHTML + '<option>'+ mList[itm][i] +'</option>';
                    }
            }
        });
    </script>
    <script>
        function onSubmit(token) {document.getElementById("demo-form").submit();}
    </script>
</body>
