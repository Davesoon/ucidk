<form action="zalozyciele.php" method="get"><br>

<fieldset>
    <legend>filtrowanie</legend>

    <label for="date">Data rejestracji:</label>
    <input type="date" value=<?php
        if(!isset($date)||$date=='') echo 'wszystkie';
        else echo $date;
    ?> name="date"><?php 
        if(!isset($date)||$date=='') echo ' wszystkie'; 
    ?><br>

    Województwo: <select name="province">

        <option <?php 
            if((!isset($province)||$province=='wszystkie')) echo 'selected="selected" ';
        ?>>wszystkie</option>

        <option <?php
            if($province=='dolnośląskie') echo 'selected="selected" ';
        ?>>dolnośląskie</option>

        <option <?php
            if($province=='kujawsko-pomorskie') echo 'selected="selected" ';
        ?>>kujawsko-pomorskie</option>

        <option <?php
            if($province=='lubelskie') echo 'selected="selected" ';
        ?>>lubelskie</option>

        <option <?php
            if($province=='lubuskie') echo 'selected="selected" ';
        ?>>lubuskie</option>

        <option <?php
            if($province=='łódzkie') echo 'selected="selected" ';
        ?>>łódzkie</option>

        <option <?php
            if($province=='małopolskie') echo 'selected="selected" ';
        ?>>małopolskie</option>

        <option <?php
            if($province=='mazowieckie') echo 'selected="selected" ';
        ?>>mazowieckie</option>

        <option <?php
            if($province=='opolskie') echo 'selected="selected" ';
        ?>>opolskie</option>

        <option <?php
            if($province=='podkarpackie') echo 'selected="selected" ';
        ?>>podkarpackie</option>

        <option <?php
            if($province=='podlaskie') echo 'selected="selected" ';
        ?>>podlaskie</option>

        <option <?php
            if($province=='pomorskie') echo 'selected="selected" ';
        ?>>pomorskie</option>

        <option <?php
            if($province=='śląskie') echo 'selected="selected" ';
        ?>>śląskie</option>

        <option <?php
            if($province=='świętokrzyskie') echo 'selected="selected" ';
        ?>>świętokrzyskie</option>

        <option <?php
            if($province=='warmińsko-mazurskie') echo 'selected="selected" ';
        ?>>warmińsko-mazurskie</option>

        <option <?php
            if($province=='wielkopolskie') echo 'selected="selected" ';
        ?>>wielkopolskie</option>

        <option <?php
            if($province=='zachodniopomorskie') echo 'selected="selected" ';
        ?>>zachodniopomorskie</option>

    </select><br>

    Gmina: <input type="text" value=<?php 
                if(!isset($community)||$community=='') echo 'wszystkie';
                else echo $community;
    ?> name="community"><br>

</fieldset>

<fieldset>
    <legend>sortowanie</legend>

    Uporządkuj:
    <input type="radio" id="desc" name="sort" value="desc" <?php
        if((!isset($sort)||$sort=='desc')) echo 'checked';
    ?>>
    <label for="desc"> malejąco</label>

    <input type="radio" id="asc" name="sort" value="asc" <?php
        if($sort=='asc') echo 'checked';
    ?>>
    <label for="asc">rosnąco</label>
    <br>

    Według: <select name="orderby">

        <option value="date" <?php
            if((!isset($orderby)||$orderby=='date')) echo 'selected="selected" ';
        ?>>data rejestracji</option>

        <option value="province" <?php
            if(($orderby=='province')) echo 'selected="selected" ';
        ?>>województwo</option>

        <option value="community" <?php
            if(($orderby=='community')) echo 'selected="selected" ';
        ?>>gmina</option>

        <option value="firstname" <?php
            if(($orderby=='firstname')) echo 'selected="selected" ';
        ?>>imię</option>

        <option value="lastname" <?php
            if(($orderby=='lastname')) echo 'selected="selected" ';
        ?>>nazwisko</option>

    </select><br>
</fieldset>

<input type="submit" value="Przetwórz">
</form>
