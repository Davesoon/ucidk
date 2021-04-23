<div class="field">
    Imię i nazwisko<br>
    <input type="text" value="<?php
    if(isset($_SESSION['fr_suspect']))
    {
        echo $_SESSION['fr_suspect'];
        unset($_SESSION['fr_suspect']);
    }
    ?>" name="suspect" required><br>
    <?php
        if(isset($_SESSION['e_suspect']))
        {
            echo '<div class="error">'.$_SESSION['e_suspect'].'</div>';
            unset($_SESSION['e_suspect']);
        }
    ?>
</div>
<div class="field">
    <span id="suspectId">Numer ID lub NIP</span><br>
    <input type="text" value="<?php
    if(isset($_SESSION['fr_suspectId']))
    {
        echo $_SESSION['fr_suspectId'];
        unset($_SESSION['fr_suspectId']);
    }
    ?>" name="suspectId" placeholder="Nieobowiązkowe..."><br>
    <?php
        if(isset($_SESSION['e_suspectId']))
        {
            echo '<div class="error">'.$_SESSION['e_suspectId'].'</div>';
            unset($_SESSION['e_suspectId']);
        }
    ?>
</div>