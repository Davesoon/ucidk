<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
        header('Location: zaloguj');
        exit();
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>POLICJA</title>
    <link rel="stylesheet" href="../styles/panels.css">
</head>
<body>
<div class="row">
    <a href="zalozyciele">Założyciele</a>
    <b>Incydenty</b>
</div>
<?php
    echo "<p>Witaj ".$_SESSION['login'].'!</p>';
    echo "<a href='../redirects/logout.php'>Wyloguj się!</a>";
    // error_reporting(0);

    //Zapamiętaj wprowadzone dane
    $formDate = $_GET['formDate'];
    $incDate = $_GET['incDate'];
    $category = $_GET['category'];
    $orderby = $_GET['orderby'];
    $sort = $_GET['sort'];

    include 'process/incydenty.php';
?>

<table border= "1px, solid, black">
    <thead>
        <tr id="table-header">
            <th>Data rejestracji</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Adres e-mail</th>
            <th>Numer telefonu</th>
            <th>Sprawca</th>
            <th>Id sprawcy</th>
            <th>Instytucja</th>
            <th>Siedziba</th>
            <th>Województwo siedziby</th>
            <th>Miejscowość siedziby</th>
            <th>Temat</th>
            <th>Data zdarzenia</th>
            <th>Opis zdarzenia</th>
            <th>Województwo zdarzenia</th>
            <th>Miejscowość zdarzenia</th>
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
                    echo "No data!";
                }
                $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    ?></tbody>
</table>

</body>