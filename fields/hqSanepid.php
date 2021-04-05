<div class="field">
    Siedziba <br> <select name="hq" <?php error_reporting(0); ?>>
        <option
            <?php  if ($_SESSION['fr_hq'] == "-- wybierz --") echo 'selected="selected" ';?>
        >-- wybierz --</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Powiatowa Stacja Sanitarno - Epidemiologiczna") echo 'selected="selected" ';?>
        >Powiatowa Stacja Sanitarno - Epidemiologiczna</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Wojewódzka Stacja Sanitarno - Epidemiologiczna") echo 'selected="selected" ';?>
        >Wojewódzka Stacja Sanitarno - Epidemiologiczna</option>
        <option
            <?php if ($_SESSION['fr_hq'] == "Główny Inspektorat Sanitarny") echo 'selected="selected" ';?>
        >Główny Inspektorat Sanitarny</option>
    </select><br>
    <?php
            if(isset($_SESSION['e_hq']))
            {
                echo '<div class="error">'.$_SESSION['e_hq'].'</div>';
                unset($_SESSION['e_hq']);
            }
    ?>
</div>
