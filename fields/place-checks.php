<div>
    Miejsce <br> <select name="place" <?php error_reporting(0); ?>>
        <option
            <?php  if ($_SESSION['fr_place'] == "-- wybierz --") echo 'selected="selected" ';?>
        >-- wybierz --</option>
        <option
            <?php if ($_SESSION['fr_place'] == "Komenda Powiatowa") echo 'selected="selected" ';?>
        >Komenda Powiatowa</option>
        <option
            <?php if ($_SESSION['fr_place'] == "Komenda Miejska") echo 'selected="selected" ';?>
        >Komenda Miejska</option>
        <option
            <?php if ($_SESSION['fr_place'] == "Komenda Wojewódzka") echo 'selected="selected" ';?>
        >Komenda Wojewódzka</option>
        <option
            <?php if ($_SESSION['fr_place'] == "Posterunek Policji") echo 'selected="selected" ';?>
        >Posterunek Policji</option>
    </select><br>
    <?php
            if(isset($_SESSION['e_place']))
            {
                echo '<div class="error">'.$_SESSION['e_place'].'</div>';
                unset($_SESSION['e_place']);
            }
    ?>
</div><br>
<label>
    <input type="checkbox" name="regulations" <?php
    if(isset($_SESSION['fr_regulations']))
    {
        echo "checked";
        unset($_SESSION['fr_regulations']);
    }
    ?>> Akceptuję REGULAMIN
</label>
<?php
    if(isset($_SESSION['e_regulations']))
    {
        echo '<div class="error">'.$_SESSION['e_regulations'].'</div>';
        unset($_SESSION['e_regulations']);
    }
?><br><br>

<button class="g-recaptcha" 
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit'>Submit
</button><br>
<?php
    if(isset($_SESSION['e_bot']))
    {
        echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
        unset($_SESSION['e_bot']);
    }
?><br>