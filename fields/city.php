<div class="field">
    Miejscowość <br> <input type="text" value="<?php
    if(isset($_SESSION['fr_city']))
    {
        echo $_SESSION['fr_city'];
        unset($_SESSION['fr_city']);
    }
    ?>" name="city" required><br>
    <?php
        if(isset($_SESSION['e_city']))
        {
            echo '<div class="error">'.$_SESSION['e_city'].'</div>';
            unset($_SESSION['e_city']);
        }
    ?>
</div>