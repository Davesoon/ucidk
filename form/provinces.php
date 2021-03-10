Województwo: <select name="province" <?php error_reporting(0); ?>>
            <option
                <?php  if ($_SESSION['fr_province'] == "-- wybierz --") echo 'selected="selected" ';?>
            >-- wybierz --</option>
            <option
                <?php if ($_SESSION['fr_province'] == "dolnośląskie") echo 'selected="selected" ';?>
            >dolnośląskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "kujawsko-pomorskie") echo 'selected="selected" ';?>
            >kujawsko-pomorskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "lubelskie") echo 'selected="selected" ';?>
            >lubelskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "lubuskie") echo 'selected="selected" ';?>
            >lubuskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "łódzkie") echo 'selected="selected" ';?>
            >łódzkie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "małopolskie") echo 'selected="selected" ';?>
            >małopolskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "mazowieckie") echo 'selected="selected" ';?>
            >mazowieckie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "opolskie") echo 'selected="selected" ';?>
            >opolskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "podkarpackie") echo 'selected="selected" ';?>
            >podkarpackie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "podlaskie") echo 'selected="selected" ';?>
            >podlaskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "pomorskie") echo 'selected="selected" ';?>
            >pomorskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "śląskie") echo 'selected="selected" ';?>
            >śląskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "świętokrzyskie") echo 'selected="selected" ';?>
            >świętokrzyskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "warmińsko-mazurskie") echo 'selected="selected" ';?>
            >warmińsko-mazurskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "wielkopolskie") echo 'selected="selected" ';?>
            >wielkopolskie</option>
            <option
                <?php if ($_SESSION['fr_province'] == "zachodniopomorskie") echo 'selected="selected" ';?>
            >zachodniopomorskie</option>
        </select><br>
        <?php
                if(isset($_SESSION['e_province']))
                {
                    echo '<div class="error">'.$_SESSION['e_province'].'</div>';
                    unset($_SESSION['e_province']);
                }
            ?>
