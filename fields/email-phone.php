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
    <div id="phone">
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
        if(isset($_SESSION['fr_number']))
        {
            echo $_SESSION['fr_number'];
            unset($_SESSION['fr_number']);
        }
        ?>" name="number" required>
    </div>
    <?php
        if(isset($_SESSION['e_number']))
        {
            echo '<div class="error">'.$_SESSION['e_number'].'</div>';
            unset($_SESSION['e_number']);
        }
    ?>
</div>