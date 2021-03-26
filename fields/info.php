<div class="field">
    Dodatkowe informacje <br> <textarea name="info" placeholder="Pole nieobowiązkowe..."><?php
        if(isset($_SESSION['fr_info']))
        {
            echo $_SESSION['fr_info'];
            unset($_SESSION['fr_info']);
        }
    ?></textarea><br>
    <?php
        if(isset($_SESSION['e_info']))
        {
            echo '<div class="error">'.$_SESSION['e_info'].'</div>';
            unset($_SESSION['e_info']);
        }
    ?>
</div>
