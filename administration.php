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
    <form action="administration.php" method="get">
        Województwo: <select name="province">
            <option>wszystkie</option>
            <option>dolnośląskie</option>
            <option>kujawsko-pomorskie</option>
            <option>lubelskie</option>
            <option>lubuskie</option>
            <option>łódzkie</option>
            <option>małopolskie</option>
            <option>mazowieckie</option>
            <option>opolskie</option>
            <option>podkarpackie</option>
            <option>podlaskie</option>
            <option>pomorskie</option>
            <option>śląskie</option>
            <option>świętokrzyskie</option>
            <option>warmińsko-mazurskie</option>
            <option>wielkopolskie</option>
            <option>zachodniopomorskie</option>
        </select><br>
        Gmina: <input type="text" name="community"><br>
        <input type="submit" value="Filtruj">
    <!-- </form>
    <form action="administration.php" method="get">
        Gmina: <input type="text" name="community">
        <input type="submit" value="Filtruj">
    </form> -->

<?php
    echo "<p>Witaj ".$_SESSION['login'].'!</p>';
    echo "<a href='logout.php'>Wyloguj się!</a>";
?>
<table border= "1px, solid, black">
    <thead>
        <tr style="color:white; background-color:black;">
            <th>Id</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Adres e-mail</th>
            <th>Numer telefonu</th>
            <th>Województwo</th>
            <th>Gmina</th>
            <th>Dodatkowe informacje</th>
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
        $province = $_GET['province'];
        $community = $_GET['community'];

        if(!isset($_GET['province'])) $province="wszystkie";
        if(!isset($_GET['community']) || $_GET['community']=="") $community="wszystkie";

        if($province=="wszystkie" && $community=="wszystkie") $query = "SELECT * FROM members";
        if($province!="wszystkie" && $community=="wszystkie") $query = "SELECT * FROM members WHERE province = '$province'";
        if($province=="wszystkie" && $community!="wszystkie") $query = "SELECT * FROM members WHERE community = '$community'";
        if($province!="wszystkie" && $community!="wszystkie") $query = "SELECT * FROM members WHERE province = '$province' AND community = '$community'";
        
        $result = $connection->query($query);
        while($row = $result->fetch_assoc())
            {
                echo "<br>";
                echo "<tr>";
                    foreach($row as $value)
                    {
                        echo "<td>".$value."</td>";
                    }
                echo "</tr>";
            }
        // unset($_GET['province']);
        // unset($_GET['community']);
        $connection->close();
    }
}
catch(Exception $e)
{
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
    echo '<br>Informacja developerska: '.$e;
}

?>

        <tr>
        
        </tr>
    </tbody>
</table>

</body>