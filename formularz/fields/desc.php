<?php
    if(isset($_SESSION['fr_desc']))
    {
        echo $_SESSION['fr_desc'];
        unset($_SESSION['fr_desc']);
    }
?></textarea><br>
<?php
    if(isset($_SESSION['e_desc']))
    {
        echo '<div class="error">'.$_SESSION['e_desc'].'</div>';
        unset($_SESSION['e_desc']);
    }
?>
