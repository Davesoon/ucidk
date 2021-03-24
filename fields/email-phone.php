<div class="field">
    E-mail <br>
    <input type="text" value="<?php
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
    ?>
</div>
<div class="field">
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
    ?>
</div>