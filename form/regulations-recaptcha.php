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