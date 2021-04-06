<form action="policja.php" method="get"><br>

<fieldset>
    <legend>filtrowanie</legend>

    <label for="formDate">Data rejestracji:</label>
    <input type="date" value=<?php
        if(!isset($formDate)||$formDate=='') echo 'wszystkie';
        else echo $formDate;
    ?> name="formDate"><?php 
        if(!isset($formDate)||$formDate=='') echo ' wszystkie'; 
    ?><br>

    <label for="incDate">Data zdarzenia:</label>
    <input type="date" value=<?php
        if(!isset($incDate)||$incDate=='') echo 'wszystkie';
        else echo $incDate;
    ?> name="incDate"><?php 
        if(!isset($incDate)||$incDate=='') echo ' wszystkie'; 
    ?><br>

    Województwo zdarzenia: <select name="incProvince">

        <option <?php 
            if((!isset($incProvince)||$incProvince=='wszystkie')) echo 'selected="selected" ';
        ?>>wszystkie</option>

        <option <?php
            if($incProvince=='dolnośląskie') echo 'selected="selected" ';
        ?>>dolnośląskie</option>

        <option <?php
            if($incProvince=='kujawsko-pomorskie') echo 'selected="selected" ';
        ?>>kujawsko-pomorskie</option>

        <option <?php
            if($incProvince=='lubelskie') echo 'selected="selected" ';
        ?>>lubelskie</option>

        <option <?php
            if($incProvince=='lubuskie') echo 'selected="selected" ';
        ?>>lubuskie</option>

        <option <?php
            if($incProvince=='łódzkie') echo 'selected="selected" ';
        ?>>łódzkie</option>

        <option <?php
            if($incProvince=='małopolskie') echo 'selected="selected" ';
        ?>>małopolskie</option>

        <option <?php
            if($incProvince=='mazowieckie') echo 'selected="selected" ';
        ?>>mazowieckie</option>

        <option <?php
            if($incProvince=='opolskie') echo 'selected="selected" ';
        ?>>opolskie</option>

        <option <?php
            if($incProvince=='podkarpackie') echo 'selected="selected" ';
        ?>>podkarpackie</option>

        <option <?php
            if($incProvince=='podlaskie') echo 'selected="selected" ';
        ?>>podlaskie</option>

        <option <?php
            if($incProvince=='pomorskie') echo 'selected="selected" ';
        ?>>pomorskie</option>

        <option <?php
            if($incProvince=='śląskie') echo 'selected="selected" ';
        ?>>śląskie</option>

        <option <?php
            if($incProvince=='świętokrzyskie') echo 'selected="selected" ';
        ?>>świętokrzyskie</option>

        <option <?php
            if($incProvince=='warmińsko-mazurskie') echo 'selected="selected" ';
        ?>>warmińsko-mazurskie</option>

        <option <?php
            if($incProvince=='wielkopolskie') echo 'selected="selected" ';
        ?>>wielkopolskie</option>

        <option <?php
            if($incProvince=='zachodniopomorskie') echo 'selected="selected" ';
        ?>>zachodniopomorskie</option>

    </select><br>

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

        <option value="formDate" <?php
            if((!isset($orderby)||$orderby=='formDate')) echo 'selected="selected" ';
        ?>>data rejestracji</option>

        <option value="lastname" <?php
            if(($orderby=='lastname')) echo 'selected="selected" ';
        ?>>nazwisko</option>

        <option value="incDate" <?php
            if($orderby=='incDate') echo 'selected="selected" ';
        ?>>data zdarzenia</option>

        <option value="hq" <?php
            if(($orderby=='hq')) echo 'selected="selected" ';
        ?>>komenda</option>

        <option value="incCity" <?php
            if(($orderby=='incCity')) echo 'selected="selected" ';
        ?>>miejscowość zdarzenia</option>

        <option value="hqCity" <?php
            if(($orderby=='hqCity')) echo 'selected="selected" ';
        ?>>miejscowość komendy</option>

        <option value="incProvince" <?php
            if(($orderby=='incProvince')) echo 'selected="selected" ';
        ?>>Województwo zdarzenia</option>

        <option value="hqProvince" <?php
            if(($orderby=='hqProvince')) echo 'selected="selected" ';
        ?>>Województwo komendy</option>

    </select><br>
</fieldset>

<input type="submit" value="Przetwórz">
</form>
