<div class="field">
    Komenda <br> <select name="hq" <?php error_reporting(0); ?>>
        <option
            <?php  if ($_SESSION['fr_hq'] == "-- wybierz --") echo 'selected="selected" ';?>
        >-- wybierz --</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Komenda Powiatowa") echo 'selected="selected" ';?>
        >Komenda Powiatowa</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Komenda Miejska") echo 'selected="selected" ';?>
        >Komenda Miejska</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Komenda Wojewódzka") echo 'selected="selected" ';?>
        >Komenda Wojewódzka</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Posterunek Policji") echo 'selected="selected" ';?>
        >Posterunek Policji</option>
    </select><br>
    <?php
            if(isset($_SESSION['e_hq']))
            {
                echo '<div class="error">'.$_SESSION['e_hq'].'</div>';
                unset($_SESSION['e_hq']);
            }
    ?>
</div>
