Gmina: <input type="text" value="<?php
        if(isset($_SESSION['fr_community']))
        {
            echo $_SESSION['fr_community'];
            unset($_SESSION['fr_community']);
        }
        ?>" name="community"><br>
        <?php
            if(isset($_SESSION['e_community']))
            {
                echo '<div class="error">'.$_SESSION['e_community'].'</div>';
                unset($_SESSION['e_community']);
            }
        ?>

        Dodatkowe informacje: <textarea name="info"><?php
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

        <p>Jeżeli chcesz dołączyć do grona założycieli UCiDK, załącz podpisany przez siebie poniższy plik</p>
        <a href="https://drive.google.com/file/d/1X3FUXDP23MnR3zTDnNUmyedsjxjZgW4c/view" target="_blank">Oświadczenie założycieli UCiDK</a><br>
        <input type="File" name="file"><br>
        <?php
            if(isset($_SESSION['e_file']))
            {
                echo '<div class="error">'.$_SESSION['e_file'].'</div>';
                unset($_SESSION['e_file']);
            }
        ?>

        <label>
            <input type="checkbox" name="regulations" <?php
            if(isset($_SESSION['fr_regulations']))
            {
                echo "checked";
                unset($_SESSION['fr_regulations']);
            }
            ?>> Akceptuję regulamin
        </label>
        <?php
            if(isset($_SESSION['e_regulations']))
            {
                echo '<div class="error">'.$_SESSION['e_regulations'].'</div>';
                unset($_SESSION['e_regulations']);
            }
        ?>

        <button class="g-recaptcha" 
                data-sitekey="reCAPTCHA_site_key" 
                data-callback='onSubmit' 
                data-action='submit'>Submit
        </button><br>
        <!-- <?php
            if(isset($_SESSION['e_bot']))
            {
                echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                unset($_SESSION['e_bot']);
            }
        ?> -->
