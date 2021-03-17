Gmina <br> <input type="text" value="<?php
if(isset($_SESSION['fr_community']))
{
    echo $_SESSION['fr_community'];
    unset($_SESSION['fr_community']);
}
?>" name="community" required><br>
<?php
    if(isset($_SESSION['e_community']))
    {
        echo '<div class="error">'.$_SESSION['e_community'].'</div>';
        unset($_SESSION['e_community']);
    }
?><br>

Dodatkowe informacje <br> <textarea name="info"><?php
    if(isset($_SESSION['fr_info']))
    {
        echo $_SESSION['fr_info'];
        unset($_SESSION['fr_info']);
    }
?></textarea><br>
<?php
    if(isset($_SESSION['e_info']))
    {
        echo '<div class="error">'.$_SESSION['e_info'].'</div>';
        unset($_SESSION['e_info']);
    }
?><br>

Jeżeli chcesz dołączyć do grona założycieli UCiDK, załącz podpisane przez siebie 
<a href="doc/oswiadczenie-zalozyciela-UCiDK.pdf" target="_blank">OŚWIADCZENIE</a><br>

<input type="File" name="file"><br>
<?php
    if(isset($_SESSION['e_file']))
    {
        echo '<div class="error">'.$_SESSION['e_file'].'</div>';
        unset($_SESSION['e_file']);
    }
?><br>

<label>
    <input type="checkbox" name="regulations" <?php
    if(isset($_SESSION['fr_regulations']))
    {
        echo "checked";
        unset($_SESSION['fr_regulations']);
    }
    ?>> Akceptuję regulamin
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