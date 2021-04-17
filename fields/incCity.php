<div class="field">
    Adres<br><input type="text" value="<?php
    if(isset($_SESSION['fr_incCity']))
    {
        echo $_SESSION['fr_incCity'];
        unset($_SESSION['fr_incCity']);
    }
    ?>" name="incCity" required><br>
    <?php
        if(isset($_SESSION['e_incCity']))
        {
            echo '<div class="error">'.$_SESSION['e_incCity'].'</div>';
            unset($_SESSION['e_incCity']);
        }
    ?>
</div>
