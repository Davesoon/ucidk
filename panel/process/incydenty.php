<form action="incydenty.php" method="get"><br>

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

    Instytucja: <select name="institution">

        <option <?php 
            if((!isset($institution)||$institution=='wszystkie')) echo 'selected="selected" ';
        ?>>wszystkie</option>

        <option <?php
            if($institution=='policja') echo 'selected="selected" ';
        ?>>policja</option>

        <option <?php
            if($institution=='sanepid') echo 'selected="selected" ';
        ?>>sanepid</option>

        <option <?php
            if($institution=='urząd') echo 'selected="selected" ';
        ?>>urząd</option>

        <option <?php
            if($institution=='sąd') echo 'selected="selected" ';
        ?>>sąd</option>

        <option <?php
            if($institution=='prokuratura') echo 'selected="selected" ';
        ?>>prokuratura</option>

        <option <?php
            if($institution=='firma') echo 'selected="selected" ';
        ?>>firma</option>

        <option <?php
            if($institution=='sklep') echo 'selected="selected" ';
        ?>>sklep</option>

        <option <?php
            if($institution=='inne') echo 'selected="selected" ';
        ?>>inne</option>

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
