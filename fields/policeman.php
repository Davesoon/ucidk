<div class="field">
    Imię i nazwisko policjanta <br>
    <input type="text" value="<?php
    if(isset($_SESSION['fr_policeman']))
    {
        echo $_SESSION['fr_policeman'];
        unset($_SESSION['fr_policeman']);
    }
    ?>" name="policeman" required><br>
    <?php
        if(isset($_SESSION['e_policeman']))
        {
            echo '<div class="error">'.$_SESSION['e_policeman'].'</div>';
            unset($_SESSION['e_policeman']);
        }
    ?>
</div>
<div class="field">
    Numer identyfikacyjny policjanta <br>
    <input type="text" value="<?php
    if(isset($_SESSION['fr_policeId']))
    {
        echo $_SESSION['fr_policeId'];
        unset($_SESSION['fr_policeId']);
    }
    ?>" name="policeId" required><br>
    <?php
        if(isset($_SESSION['e_policeId']))
        {
            echo '<div class="error">'.$_SESSION['e_policeId'].'</div>';
            unset($_SESSION['e_policeId']);
        }
    ?>
</div>