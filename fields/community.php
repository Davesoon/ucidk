<div class="field">
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
    ?>
</div>