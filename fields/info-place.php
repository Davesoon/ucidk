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
<div class="field">
    Miejsce <br> <select name="place" <?php error_reporting(0); ?>>
        <option
            <?php  if ($_SESSION['fr_place'] == "-- wybierz --") echo 'selected="selected" ';?>
        >-- wybierz --</option>
        <option
            <?php if ($_SESSION['fr_place'] == "Komenda Powiatowa") echo 'selected="selected" ';?>
        >Komenda Powiatowa</option>
        <option
            <?php if ($_SESSION['fr_place'] == "Komenda Miejska") echo 'selected="selected" ';?>
        >Komenda Miejska</option>
        <option
            <?php if ($_SESSION['fr_place'] == "Komenda Wojewódzka") echo 'selected="selected" ';?>
        >Komenda Wojewódzka</option>
        <option
            <?php if ($_SESSION['fr_place'] == "Posterunek Policji") echo 'selected="selected" ';?>
        >Posterunek Policji</option>
    </select><br>
    <?php
            if(isset($_SESSION['e_place']))
            {
                echo '<div class="error">'.$_SESSION['e_place'].'</div>';
                unset($_SESSION['e_place']);
            }
    ?>
</div>
