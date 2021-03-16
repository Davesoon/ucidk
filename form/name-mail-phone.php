Imię <br>
<input type="text" value="<?php
if(isset($_SESSION['fr_firstname']))
{
    echo $_SESSION['fr_firstname'];
    unset($_SESSION['fr_firstname']);
}
?>" name="firstname" required><br>
<?php
    if(isset($_SESSION['e_firstname']))
    {
        echo '<div class="error">'.$_SESSION['e_firstname'].'</div>';
        unset($_SESSION['e_firstname']);
    }
?><br>

Nazwisko <br>
<input type="text" value="<?php
if(isset($_SESSION['fr_lastname']))
{
    echo $_SESSION['fr_lastname'];
    unset($_SESSION['fr_lastname']);
}
?>" name="lastname" required><br>
<?php
    if(isset($_SESSION['e_lastname']))
    {
        echo '<div class="error">'.$_SESSION['e_lastname'].'</div>';
        unset($_SESSION['e_lastname']);
    }
?><br>

E-mail <br>
<input type="email" value="<?php
if(isset($_SESSION['fr_email']))
{
    echo $_SESSION['fr_email'];
    unset($_SESSION['fr_email']);
}
?>" name="email" required><br>
<?php
    if(isset($_SESSION['e_email']))
    {
        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
        unset($_SESSION['e_email']);
    }
?><br>

Telefon <br>
<div id="fullNumber">
    <input type="text" value="<?php
        if(isset($_SESSION['fr_direction']))
        {
            echo $_SESSION['fr_direction'];
            unset($_SESSION['fr_direction']);
        }
        else echo "+48";
    ?>"
    name="direction" maxlength="4" required
    pattern="[+]+([0-9]|[0-9][0-9]|[0-9][0-9][0-9])">
    <input type="text" value="<?php
    if(isset($_SESSION['fr_phone']))
    {
        echo $_SESSION['fr_phone'];
        unset($_SESSION['fr_phone']);
    }
    ?>" name="phone" required>
</div>
<?php
    if(isset($_SESSION['e_phone']))
    {
        echo '<div class="error">'.$_SESSION['e_phone'].'</div>';
        unset($_SESSION['e_phone']);
    }
?><br>