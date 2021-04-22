<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link rel="icon" href="../images/logo.png">
    <title>POLICJA</title>
    <link rel="stylesheet" href="../styles/panels.css">
</head>
<body>
<div class="row">
    <a href="zalozyciele"><h2>Założyciele</h2></a>
    <h2>Incydenty</h2>
</div>
<?php
    error_reporting(0);

    //Zapamiętaj wprowadzone dane
    $formDate = $_GET['formDate'];
    $incDate = $_GET['incDate'];
    $category = $_GET['category'];
    $orderby = $_GET['orderby'];
    $sort = $_GET['sort'];

    include 'process/incydenty.php';
?>
<br>
<table border= "1px, solid, black">
    <thead>
    <tr>
        <th colspan="5" class="table-header">ZGŁASZAJĄCY</th>
        <th colspan="6" class="table-header">SPRAWCA</th>
        <th colspan="5" class="table-header">ZDARZENIE</th>
    </tr>
        <tr class="table-header">
            <th>Data rejestracji</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Imię i nazwisko lub nazwa</th>
            <th>ID lub NIP</th>
            <th>Podmiot</th>
            <th>Szczegóły podmiotu</th>
            <th>Województwo</th>
            <th>Adres</th>
            <th>Temat</th>
            <th>Data</th>
            <th>Opis</th>
            <th>Województwo</th>
            <th>Adres</th>
        </tr>
    </thead>
    <tbody><?php

        require_once "../connect.php";
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
                $formDate = $_GET['formDate'];
                $incDate = $_GET['incDate'];
                $category = $_GET['category'];
                $orderby = $_GET['orderby'];
                $sort = $_GET['sort'];

                if(!isset($_GET['formDate']) || $_GET['formDate']=="") $formDate="wszystkie";
                if(!isset($_GET['incDate']) || $_GET['incDate']=="") $incDate="wszystkie";
                if(!isset($_GET['category']) || $_GET['category']=="") $category="wszystkie";
                if(!isset($_GET['orderby'])) $orderby="formDate";
                if(!isset($_GET['sort'])) $sort="desc";

                if($formDate=="wszystkie" && $incDate=="wszystkie" && $category=="wszystkie") 
                $query = "SELECT * FROM incidents ORDER BY $orderby $sort";

                if($formDate!="wszystkie" && $incDate=="wszystkie" && $category=="wszystkie") 
                $query = "SELECT * FROM incidents WHERE formDate = '$formDate' ORDER BY $orderby $sort";

                if($formDate=="wszystkie" && $incDate!="wszystkie" && $category=="wszystkie") 
                $query = "SELECT * FROM incidents WHERE incDate = '$incDate' ORDER BY $orderby $sort";

                if($formDate=="wszystkie" && $incDate=="wszystkie" && $category!="wszystkie") 
                $query = "SELECT * FROM incidents WHERE category = '$category' ORDER BY $orderby $sort";

                if($formDate!="wszystkie" && $incDate!="wszystkie" && $category=="wszystkie") 
                $query = "SELECT * FROM incidents WHERE formDate = '$formDate' AND incDate = '$incDate' ORDER BY $orderby $sort";

                if($formDate!="wszystkie" && $incDate=="wszystkie" && $category!="wszystkie") 
                $query = "SELECT * FROM incidents WHERE formDate = '$formDate' AND category = '$category' ORDER BY $orderby $sort";

                if($formDate=="wszystkie" && $incDate!="wszystkie" && $category!="wszystkie") 
                $query = "SELECT * FROM incidents WHERE incDate = '$incDate' AND category = '$category' ORDER BY $orderby $sort";

                if($formDate!="wszystkie" && $incDate!="wszystkie" && $category!="wszystkie") 
                $query = "SELECT * FROM incidents WHERE formDate = '$formDate' AND incDate = '$incDate' AND category = '$category' ORDER BY $orderby $sort";
                
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
                            ."<td>".$row["suspect"]."</td>"
                            ."<td>".$row["suspectId"]."</td>"
                            ."<td>".$row["category"]."</td>"
                            ."<td>".$row["subCategory"]."</td>"
                            ."<td>".$row["hqProvince"]."</td>"
                            ."<td>".$row["hqCity"]."</td>"
                            ."<td>".$row["subject"]."</td>"
                            ."<td>".$row["incDate"]."</td>"
                            ."<td>".$row["desc"]."</td>"
                            ."<td>".$row["incProvince"]."</td>"
                            ."<td>".$row["incCity"]."</td>"
                            ."</tr>";
                    }
                }
                else 
                {
                    echo '<h1>BRAK DANYCH W BAZIE!</h1>';
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