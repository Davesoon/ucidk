Województwo zdarzenia <br> <select name="incProvince" <?php error_reporting(0); ?>>
    <option
        <?php  if ($_SESSION['fr_incProvince'] == "-- wybierz --") echo 'selected="selected" ';?>
    >-- wybierz --</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "dolnośląskie") echo 'selected="selected" ';?>
    >dolnośląskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "kujawsko-pomorskie") echo 'selected="selected" ';?>
    >kujawsko-pomorskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "lubelskie") echo 'selected="selected" ';?>
    >lubelskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "lubuskie") echo 'selected="selected" ';?>
    >lubuskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "łódzkie") echo 'selected="selected" ';?>
    >łódzkie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "małopolskie") echo 'selected="selected" ';?>
    >małopolskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "mazowieckie") echo 'selected="selected" ';?>
    >mazowieckie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "opolskie") echo 'selected="selected" ';?>
    >opolskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "podkarpackie") echo 'selected="selected" ';?>
    >podkarpackie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "podlaskie") echo 'selected="selected" ';?>
    >podlaskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "pomorskie") echo 'selected="selected" ';?>
    >pomorskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "śląskie") echo 'selected="selected" ';?>
    >śląskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "świętokrzyskie") echo 'selected="selected" ';?>
    >świętokrzyskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "warmińsko-mazurskie") echo 'selected="selected" ';?>
    >warmińsko-mazurskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "wielkopolskie") echo 'selected="selected" ';?>
    >wielkopolskie</option>
    <option
        <?php if ($_SESSION['fr_incProvince'] == "zachodniopomorskie") echo 'selected="selected" ';?>
    >zachodniopomorskie</option>
</select><br>
<?php
        if(isset($_SESSION['e_incProvince']))
        {
            echo '<div class="error">'.$_SESSION['e_incProvince'].'</div>';
            unset($_SESSION['e_incProvince']);
        }
?>
