<div class="fieldRow">
    Załącz podpisane przez siebie 
    <a href="../documents/oswiadczenie-zalozyciela-UCiDK.pdf" target="_blank">OŚWIADCZENIE</a>
    założyciela.<br>
    <input type="File" name="file" required><br>
    <?php
        if(isset($_SESSION['e_file']))
        {
            echo '<div class="error">'.$_SESSION['e_file'].'</div>';
            unset($_SESSION['e_file']);
        }
    ?>
</div>