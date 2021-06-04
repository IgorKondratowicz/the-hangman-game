<?php
    
    $db = mysqli_connect("localhost", "root", "", "wisielec");
    $query = "SELECT uzytkownik, punkty FROM `uzytkownicy` order by punkty DESC limit 10";
    $result = mysqli_query($db, $query);

    if(isset($_POST['back_to_level'])){
        header("location: gra.php");
        
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_leaderboard.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <header class="title">
        <form action="" method="post"><input type="submit" class="back_to_level" name="back_to_level" value="powrót do gry"></form>
        <div class="name">WISIELEC</div> 
    </header>
    <div class="top"><h1>TOP 10 GRACZY</h1></div>
    <table>
        <tr><th>nazwa użytkownika</th><th>ilość punktów</th></tr>
        <?php
            while($row = mysqli_fetch_array($result)){
                echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
            }
        ?>
    </table>
</body>
</html>