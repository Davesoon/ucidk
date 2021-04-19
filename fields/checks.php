<label>
    <input type="checkbox" name="regulations" <?php
    if(isset($_SESSION['fr_regulations']))
    {
        echo "checked";
        unset($_SESSION['fr_regulations']);
    }
    ?>> Akceptuję REGULAMIN
</label><br>
<?php
    if(isset($_SESSION['e_regulations']))
    {
        echo '<div class="error">'.$_SESSION['e_regulations'].'</div>';
        unset($_SESSION['e_regulations']);
    }
?><br>
<div class="g-recaptcha" data-sitekey="6Ld_5a4aAAAAADV2gvAStz-cCWct0eByRuEWiEGM"></div><br>
<?php
    if(isset($_SESSION['e_bot']))
    {
        echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
        unset($_SESSION['e_bot']);
    }
?>
