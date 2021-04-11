<div class="field"> Województwo
    <br><select name="hqProvince" <?php error_reporting(0); ?>>
    <option
        <?php  if ($_SESSION['fr_hqProvince'] == "-- wybierz --") echo 'selected="selected" ';?>
    >-- wybierz --</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "dolnośląskie") echo 'selected="selected" ';?>
    >dolnośląskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "kujawsko-pomorskie") echo 'selected="selected" ';?>
    >kujawsko-pomorskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "lubelskie") echo 'selected="selected" ';?>
    >lubelskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "lubuskie") echo 'selected="selected" ';?>
    >lubuskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "łódzkie") echo 'selected="selected" ';?>
    >łódzkie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "małopolskie") echo 'selected="selected" ';?>
    >małopolskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "mazowieckie") echo 'selected="selected" ';?>
    >mazowieckie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "opolskie") echo 'selected="selected" ';?>
    >opolskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "podkarpackie") echo 'selected="selected" ';?>
    >podkarpackie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "podlaskie") echo 'selected="selected" ';?>
    >podlaskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "pomorskie") echo 'selected="selected" ';?>
    >pomorskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "śląskie") echo 'selected="selected" ';?>
    >śląskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "świętokrzyskie") echo 'selected="selected" ';?>
    >świętokrzyskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "warmińsko-mazurskie") echo 'selected="selected" ';?>
    >warmińsko-mazurskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "wielkopolskie") echo 'selected="selected" ';?>
    >wielkopolskie</option>
    <option
        <?php if ($_SESSION['fr_hqProvince'] == "zachodniopomorskie") echo 'selected="selected" ';?>
    >zachodniopomorskie</option>
    </select><br>
    <?php
            if(isset($_SESSION['e_hqProvince']))
            {
                echo '<div class="error">'.$_SESSION['e_hqProvince'].'</div>';
                unset($_SESSION['e_hqProvince']);
            }
    ?>
</div>