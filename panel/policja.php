<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
        header('Location: ../zaloguj.php');
        exit();
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>POLICJA</title>
    <style>
        table thead tr th, table tbody tr td
        {
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="row">
    <a href="zalozyciele.php">Założyciele</a>
    <b>Policja</b>
    <a href="sanepid.php">Sanepid</a>
    <a href="urzad.php">Urząd</a>
    <a href="sad.php">Sąd</a>
    <a href="prokuratura.php">Prokuratura</a>
    <a href="firma.php">Firma</a>
    <a href="sklep.php">Sklep</a>
    <a href="inne.php">Inne</a>
</div>
<?php
    echo "<p>Witaj ".$_SESSION['login'].'!</p>';
    echo "<a href='../redirects/logout.php'>Wyloguj się!</a>";
    error_reporting(0);

    //Zapamiętaj wprowadzone dane
    $province = $_GET['province'];
    $community = $_GET['community'];
    $date = $_GET['date'];
    $sort = $_GET['sort'];
    $orderby = $_GET['orderby'];

    // include '../process/policja.php';
?>

<table border= "1px, solid, black">
    <thead>
        <tr style="color:white; background-color:black;">
            <th>Data rejestracji</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Adres e-mail</th>
            <th>Numer telefonu</th>
            <th>Imię i nazwisko policjanta</th>
            <th>Numer identyfikacyjny policjanta</th>
            <th>Data zdarzenia</th>
            <th>Komenda</th>
            <th>Miejscowość zdarzenia</th>
            <th>Miejscowość komendy</th>
            <th>Województwo zdarzenia</th>
            <th>Województwo komendy</th>
            <th>Opis zdarzenia</th>
        </tr>
    </thead>
    <tbody><?php

        require_once "../redirects/connect.php";
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

                if($date=="wszystkie" && $province=="wszystkie" && $community=="wszystkie") 
                $query = "SELECT * FROM ucidk_members ORDER BY $orderby $sort";

                if($date!="wszystkie" && $province=="wszystkie" && $community=="wszystkie") 
                $query = "SELECT * FROM ucidk_members WHERE date = '$date' ORDER BY $orderby $sort";

                if($date=="wszystkie" && $province!="wszystkie" && $community=="wszystkie") 
                $query = "SELECT * FROM ucidk_members WHERE province = '$province' ORDER BY $orderby $sort";

                if($date=="wszystkie" && $province=="wszystkie" && $community!="wszystkie") 
                $query = "SELECT * FROM ucidk_members WHERE community = '$community' ORDER BY $orderby $sort";

                if($date!="wszystkie" && $province!="wszystkie" && $community=="wszystkie") 
                $query = "SELECT * FROM ucidk_members WHERE date = '$date' AND province = '$province' ORDER BY $orderby $sort";

                if($date!="wszystkie" && $province=="wszystkie" && $community!="wszystkie") 
                $query = "SELECT * FROM ucidk_members WHERE date = '$date' AND community = '$community' ORDER BY $orderby $sort";

                if($date=="wszystkie" && $province!="wszystkie" && $community!="wszystkie") 
                $query = "SELECT * FROM ucidk_members WHERE province = '$province' AND community = '$community' ORDER BY $orderby $sort";

                if($date!="wszystkie" && $province!="wszystkie" && $community!="wszystkie") 
                $query = "SELECT * FROM ucidk_members WHERE date = '$date' AND province = '$province' AND community = '$community' ORDER BY $orderby $sort";
                
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
                        echo "<tr>"
                            ."<td>".$row["formDate"]."</td>"
                            ."<td>".$row["firstname"]."</td>"
                            ."<td>".$row["lastname"]."</td>"
                            ."<td>".$row["email"]."</td>"
                            ."<td>".$row["phone"]."</td>"
                            ."<td>".$row["policeman"]."</td>"
                            ."<td>".$row["policeId"]."</td>"
                            ."<td>".$row["incDate"]."</td>"
                            ."<td>".$row["hq"]."</td>"
                            ."<td>".$row["incCity"]."</td>"
                            ."<td>".$row["hqCity"]."</td>"
                            ."<td>".$row["incProvince"]."</td>"
                            ."<td>".$row["hqProvince"]."</td>"
                            ."<td>".$row["desc"]."</td>"
                            ."</tr>";
                    }
                }
                else 
                {
                    echo "No data!";
                }
                $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            // echo '<br>Informacja developerska: '.$e;
        }
    ?></tbody>
</table>

</body>