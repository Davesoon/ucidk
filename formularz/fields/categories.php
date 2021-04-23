<div class="field">
    Podmiot
    <select name="category" id="category" onchange="fieldChanging()">
        <option>-- wybierz --</option>
    </select>
    <?php
        if(isset($_SESSION['e_category']))
        {
            echo '<div class="error">'.$_SESSION['e_category'].'</div>';
            unset($_SESSION['e_category']);
        }
    ?>
</div>
<div class="field">
    Szczegóły podmiotu
    <select name="subCategorySelect" id="subCategorySelect"></select>
    <input type="text" id="subCategoryText" value="<?php
    if(isset($_SESSION['fr_subCategoryText']))
    {
        echo $_SESSION['fr_subCategoryText'];
        unset($_SESSION['fr_subCategoryText']);
    }
    ?>" name="subCategoryText" style="display: none;"><br>
    <?php
        if(isset($_SESSION['e_subCategory']))
        {
            echo '<div class="error">'.$_SESSION['e_subCategory'].'</div>';
            unset($_SESSION['e_subCategory']);
        }
    ?>
</div>
