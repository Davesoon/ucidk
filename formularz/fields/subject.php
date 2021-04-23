<div class="field">
   Temat <br><input type="text" value="<?php
   if(isset($_SESSION['fr_subject']))
   {
       echo $_SESSION['fr_subject'];
       unset($_SESSION['fr_subject']);
   }
   ?>" name="subject" required pattern=".{4,40}" title="Od 4 do 40 znaków!"><br>
   <?php
       if(isset($_SESSION['e_subject']))
       {
           echo '<div class="error">'.$_SESSION['e_subject'].'</div>';
           unset($_SESSION['e_subject']);
       }
   ?>
</div>