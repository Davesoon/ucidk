<div class="field">
    Data zdarzenia <br> <input type="date" value="<?php
    if(isset($_SESSION['fr_incDate']))
    {
        echo $_SESSION['fr_incDate'];
        unset($_SESSION['fr_incDate']);
    }
    ?>" name="incDate" required><br>
    <?php
        if(isset($_SESSION['e_incDate']))
        {
            echo '<div class="error">'.$_SESSION['e_incDate'].'</div>';
            unset($_SESSION['e_incDate']);
        }
    ?>
</div>