<br><input type="text" value="<?php
if(isset($_SESSION['fr_hqCity']))
{
    echo $_SESSION['fr_hqCity'];
    unset($_SESSION['fr_hqCity']);
}
?>" name="hqCity" required><br>
<?php
    if(isset($_SESSION['e_hqCity']))
    {
        echo '<div class="error">'.$_SESSION['e_hqCity'].'</div>';
        unset($_SESSION['e_hqCity']);
    }
?>
