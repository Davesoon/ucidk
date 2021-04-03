<div class="field">
    Komenda <br> <select name="hq" <?php error_reporting(0); ?>>
        <option
            <?php  if ($_SESSION['fr_hq'] == "-- wybierz --") echo 'selected="selected" ';?>
        >-- wybierz --</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Główna") echo 'selected="selected" ';?>
        >Główna</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Stołeczna") echo 'selected="selected" ';?>
        >Stołeczna</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Wojewódzka") echo 'selected="selected" ';?>
        >Wojewódzka</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Miejska") echo 'selected="selected" ';?>
        >Miejska</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Powiatowa") echo 'selected="selected" ';?>
        >Powiatowa</option>
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
