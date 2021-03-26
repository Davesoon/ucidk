<div class="info">
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
<div class="info">
    Załącz podpisane przez siebie 
    <a href="documents/oswiadczenie-zalozyciela-UCiDK.pdf" target="_blank">OŚWIADCZENIE</a>
    założyciela.<br>

    <input type="File" name="file"><br>
    <?php
        if(isset($_SESSION['e_file']))
        {
            echo '<div class="error">'.$_SESSION['e_file'].'</div>';
            unset($_SESSION['e_file']);
        }
    ?>
</div>
