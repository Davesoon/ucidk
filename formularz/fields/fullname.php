<div class="field">
    Imię <br>
    <input type="text" value="<?php
    if(isset($_SESSION['fr_firstname']))
    {
        echo $_SESSION['fr_firstname'];
        unset($_SESSION['fr_firstname']);
    }
    ?>" name="firstname" required pattern="[A-Za-z]{3,20}" title="Od 3 do 20 liter!"><br>
    <?php
        if(isset($_SESSION['e_firstname']))
        {
            echo '<div class="error">'.$_SESSION['e_firstname'].'</div>';
            unset($_SESSION['e_firstname']);
        }
    ?>
</div>
<div class="field">
    Nazwisko <br>
    <input type="text" value="<?php
    if(isset($_SESSION['fr_lastname']))
    {
        echo $_SESSION['fr_lastname'];
        unset($_SESSION['fr_lastname']);
    }
    ?>" name="lastname" required pattern="[A-Za-z]{3,20}" title="Od 3 do 30 liter!"><br>
    <?php
        if(isset($_SESSION['e_lastname']))
        {
            echo '<div class="error">'.$_SESSION['e_lastname'].'</div>';
            unset($_SESSION['e_lastname']);
        }
    ?>
</div>