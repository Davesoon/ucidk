<form action="incydenty" method="get"><br>

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

    Podmiot: <select name="category">

        <option <?php 
            if((!isset($category)||$category=='wszystkie')) echo 'selected="selected" ';
        ?>>wszystkie</option>

        <option <?php
            if($category=='policja') echo 'selected="selected" ';
        ?>>policja</option>

        <option <?php
            if($category=='sanepid') echo 'selected="selected" ';
        ?>>sanepid</option>

        <option <?php
            if($category=='urząd') echo 'selected="selected" ';
        ?>>urząd</option>

        <option <?php
            if($category=='sąd') echo 'selected="selected" ';
        ?>>sąd</option>

        <option <?php
            if($category=='prokuratura') echo 'selected="selected" ';
        ?>>prokuratura</option>

        <option <?php
            if($category=='firma') echo 'selected="selected" ';
        ?>>firma</option>

        <option <?php
            if($category=='sklep') echo 'selected="selected" ';
        ?>>sklep</option>

        <option <?php
            if($category=='inne') echo 'selected="selected" ';
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
        ?>>zgłaszający - nazwisko</option>

        <option value="suspect" <?php
            if($orderby=='suspect') echo 'selected="selected" ';
        ?>>sprawca - nazwa</option>

        <option value="suspectId" <?php
            if(($orderby=='suspectId')) echo 'selected="selected" ';
        ?>>sprawca - ID/NIP</option>

        <option value="category" <?php
            if(($orderby=='category')) echo 'selected="selected" ';
        ?>>sprawca - podmiot</option>

        <option value="subCategory" <?php
            if(($orderby=='subCategory')) echo 'selected="selected" ';
        ?>>sprawca - szczegóły podmiotu</option>

        <option value="hqProvince" <?php
            if(($orderby=='hqProvince')) echo 'selected="selected" ';
        ?>>sprawca - województwo</option>

        <option value="subject" <?php
            if(($orderby=='subject')) echo 'selected="selected" ';
        ?>>zdarzenie - temat</option>

        <option value="incDate" <?php
            if(($orderby=='incDate')) echo 'selected="selected" ';
        ?>>zdarzenie - data</option>

        <option value="incProvince" <?php
            if(($orderby=='incProvince')) echo 'selected="selected" ';
        ?>>zdarzenie - województwo</option>

    </select><br>
</fieldset>

<input type="submit" value="Przetwórz">
</form>
