<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>ZALOGUJ</title>
    <style>
        table thead tr th, table tbody tr td
        {
            padding: 10px;
        }
    </style>
</head>
<body>
<?php
    echo "<p>Witaj ".$_SESSION['login'].'!</p>';
    echo "<a href='logout.php'>Wyloguj się!</a>";
    error_reporting(0);

    //Zapamiętaj wprowadzone dane
    // $_SESSION['fr_province'] = $province;
    // $_SESSION['test'] = $test;
    $province = $_GET['province'];
    $community = $_GET['community'];
    $date = $_GET['date'];

    // $_SESSION['fr_sort'] = $sort;
    // $_SESSION['fr_orderby'] = $orderby;
?>
    <form action="administration.php" method="get"><br>

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

        Uporządkuj: 
        <input type="radio" id="asc" name="sort" value="asc">
        <label for="desc">malejąco</label>
        <input type="radio" id="desc" name="sort" value="desc">
        <label for="asc">rosnąco</label>
<br>
        Według: <select name="orderby">
            <option value="date">data rejestracji</option>
            <option value="province">województwo</option>
            <option value="community">gmina</option>
            <option value="firstname">imię</option>
            <option value="lastname">nazwisko</option>
        </select><br>

        <input type="submit" value="Przetwórz">

<table border= "1px, solid, black">
    <thead>
        <tr style="color:white; background-color:black;">
            <th>Data rejestracji</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Adres e-mail</th>
            <th>Numer telefonu</th>
            <th>Województwo</th>
            <th>Gmina</th>
            <th>Dodatkowe informacje</th>
            <th>Plik</th>
        </tr>
    </thead>
    <tbody>
    <?php

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try
{
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    if($connection->connect_errno!=0)
    {
        throw new Exception(mysqli_connect_errno());
    }
    else
    {
        $date = $_GET['date'];
        $province = $_GET['province'];
        $community = $_GET['community'];
        $orderby = $_GET['orderby'];
        $sort = $_GET['sort'];

        if(!isset($_GET['date']) || $_GET['date']=="") $date="wszystkie";
        if(!isset($_GET['province'])) $province="wszystkie";
        if(!isset($_GET['community']) || $_GET['community']=="") $community="wszystkie";
        if(!isset($_GET['orderby'])) $orderby="date";
        if(!isset($_GET['sort'])) $sort="desc";

        if($date=="wszystkie" && $province=="wszystkie" && $community=="wszystkie") $query = 
        "SELECT * FROM members ORDER BY $orderby $sort";

        if($date!="wszystkie" && $province=="wszystkie" && $community=="wszystkie") $query = 
        "SELECT * FROM members WHERE date = '$date' ORDER BY $orderby $sort";

        if($date=="wszystkie" && $province!="wszystkie" && $community=="wszystkie") $query = 
        "SELECT * FROM members WHERE province = '$province' ORDER BY $orderby $sort";

        if($date=="wszystkie" && $province=="wszystkie" && $community!="wszystkie") $query = 
        "SELECT * FROM members WHERE community = '$community' ORDER BY $orderby $sort";

        if($date!="wszystkie" && $province!="wszystkie" && $community=="wszystkie") $query = 
        "SELECT * FROM members WHERE date = '$date' AND province = '$province' ORDER BY $orderby $sort";

        if($date!="wszystkie" && $province=="wszystkie" && $community!="wszystkie") $query = 
        "SELECT * FROM members WHERE date = '$date' AND community = '$community' ORDER BY $orderby $sort";

        if($date=="wszystkie" && $province!="wszystkie" && $community!="wszystkie") $query = 
        "SELECT * FROM members WHERE province = '$province' AND community = '$community' ORDER BY $orderby $sort";

        if($date!="wszystkie" && $province!="wszystkie" && $community!="wszystkie") $query = 
        "SELECT * FROM members WHERE date = '$date' AND province = '$province' AND community = '$community' ORDER BY $orderby $sort";

        // if($province!="wszystkie" && $community=="wszystkie") $query = 
        // "SELECT * FROM members WHERE province = '$province' ORDER BY $orderby $sort";
        // if($province=="wszystkie" && $community!="wszystkie") $query = 
        // "SELECT * FROM members WHERE community = '$community' ORDER BY $orderby $sort";
        // if($province!="wszystkie" && $community!="wszystkie") $query = 
        // "SELECT * FROM members WHERE province = '$province' AND community = '$community' ORDER BY $orderby $sort";
        
        $result = $connection->query($query);
        // while($row = $result->fetch_assoc())
        //     {
        //         echo "<br>";
        //         echo "<tr>";
        //             foreach($row as $value)
        //             {
        //                 echo "<td>".$value."</td>";
        //             }
        //         echo "</tr>";
        //     }
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "<br><tr>"
                    ."<td>".$row["date"]."</td>"
                    ."<td>".$row["firstname"]."</td>"
                    ."<td>".$row["lastname"]."</td>"
                    ."<td>".$row["email"]."</td>"
                    ."<td>".$row["phone"]."</td>"
                    ."<td>".$row["province"]."</td>"
                    ."<td>".$row["community"]."</td>"
                    ."<td>".$row["info"]."</td>"
                    ."<td><a href=uploads/".$row["file"].">".$row["file"]."</a></td>"
                    ."</tr>";
            }
        }
        else 
        {
            echo "No data!";
        }
        
        // unset($_GET['province']);
        // unset($_GET['community']);
        $connection->close();
    }
}
catch(Exception $e)
{
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
    // echo '<br>Informacja developerska: '.$e;
}

?>

        <tr>
        
        </tr>
    </tbody>
</table>

</body>