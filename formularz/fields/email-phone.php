<div class="field">
    E-mail <br>
    <input type="email" value="<?php
    if(isset($_SESSION['fr_email']))
    {
        echo $_SESSION['fr_email'];
        unset($_SESSION['fr_email']);
    }
    ?>" name="email" required pattern=".{10,50}" title="Od 10 do 50 znaków!"><br>
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
        <input type="tel" value="<?php
        if(isset($_SESSION['fr_phone']))
        {
            echo $_SESSION['fr_phone'];
            unset($_SESSION['fr_phone']);
        }
        else
        {
            echo "+48 ";
        }
        ?>" name="phone" pattern="[+]+([0-9]{2,3}) [0-9]{7,12}" title="+48 123456789 (spacja po kierunkowym, 11-17 znaków)" required>
    <?php
        if(isset($_SESSION['e_phone']))
        {
            echo '<div class="error">'.$_SESSION['e_phone'].'</div>';
            unset($_SESSION['e_phone']);
        }
    ?>
</div>