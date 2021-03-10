Imię: <input type="text" value="<?php
        if(isset($_SESSION['fr_firstname']))
        {
            echo $_SESSION['fr_firstname'];
            unset($_SESSION['fr_firstname']);
        }
        ?>" name="firstname"><br>
        <?php
            if(isset($_SESSION['e_firstname']))
            {
                echo '<div class="error">'.$_SESSION['e_firstname'].'</div>';
                unset($_SESSION['e_firstname']);
            }
        ?>

        Nazwisko: <input type="text" value="<?php
        if(isset($_SESSION['fr_lastname']))
        {
            echo $_SESSION['fr_lastname'];
            unset($_SESSION['fr_lastname']);
        }
        ?>" name="lastname"><br>
        <?php
            if(isset($_SESSION['e_lastname']))
            {
                echo '<div class="error">'.$_SESSION['e_lastname'].'</div>';
                unset($_SESSION['e_lastname']);
            }
        ?>

        E-mail: <input type="email" value="<?php
        if(isset($_SESSION['fr_email']))
        {
            echo $_SESSION['fr_email'];
            unset($_SESSION['fr_email']);
        }
        ?>" name="email"><br>
        <?php
            if(isset($_SESSION['e_email']))
            {
                echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                unset($_SESSION['e_email']);
            }
        ?>

        Telefon: <input type="tel" value="<?php
        if(isset($_SESSION['fr_phone']))
        {
            echo $_SESSION['fr_phone'];
            unset($_SESSION['fr_phone']);
        }
        ?>" name="phone"><br>
        <?php
            if(isset($_SESSION['e_phone']))
            {
                echo '<div class="error">'.$_SESSION['e_phone'].'</div>';
                unset($_SESSION['e_phone']);
            }
        ?>
