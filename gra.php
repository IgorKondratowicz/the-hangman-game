<?php
    session_start();
    if(!isset($_SESSION['level'])) header("location: index.php");
    
    function new_word(){
        $db = mysqli_connect("localhost", "root", "", "wisielec");
        $random_word = 'Select haslo from haslo where poziom = "'.$_SESSION['level'].'" order by rand() limit 1';
        $random_query = mysqli_query($db, $random_word);
        
        $_SESSION['final_word'] = mysqli_fetch_array($random_query)[0];
        $_SESSION['checked'] = [];
        $_SESSION['photo'] = 0;
        $_SESSION['points'] = 0;

        for($i=0; $i<strlen($_SESSION['final_word']); $i++){
            array_push($_SESSION['checked'], "");
        }
    }
    
    if(!isset($_SESSION['final_word'])){
        new_word();
    }

    if(isset($_POST['zakoncz'])){
        new_word();
    }
    
    //dodanie podanej litery do tablicy odpowiedzi
    if(isset($_POST['check'])){
        for($i=0; $i<strlen($_SESSION['final_word']); $i++){
            if($_POST['letter'] == $_SESSION['final_word'][$i]){
                $_SESSION['checked'][$i] = $_POST['letter'];
            }
        }
    }

    // sprawdzenie czy podana litera znajduje się w haśle
    $zmienna = False;
    if(isset($_POST['check'])){
        for($i=0; $i<strlen($_SESSION['final_word']); $i++){
            if($_POST['letter'] == $_SESSION['final_word'][$i]){
                $zmienna = True;
                switch($_SESSION['level']){
                    case "latwy": $_SESSION['points']+=5;break;
                    case "sredni": $_SESSION['points']+=5;break;
                    case "trudny": $_SESSION['points']+=5;break;
                    default: $_SESSION['points']+=0;break;
                }
            }
            
        }
        
        if($zmienna == False){
            $_SESSION['photo']+=1;
            ($_SESSION['points']>=3) ? $_SESSION['points']-=3: $_SESSION['points']=0 ;
        }
    }

    if(isset($_POST['back_to_level'])){
        session_destroy();
        header("location: index.php");
    }

    // sprawdzenie czy elementy tablicy zgadzają się z hasłem
    $win = True;
    for($i=0; $i<strlen($_SESSION['final_word']); $i++){
        if($_SESSION['checked'][$i] != $_SESSION['final_word'][$i]){
            $win = false;
        }
        
    }
    if(isset($_POST['check'])){
        if($win){
            switch($_SESSION['level']){
                case "latwy": $_SESSION['points']+=10;break;
                case "sredni": $_SESSION['points']+=20;break;
                case "trudny": $_SESSION['points']+=30;break;
                default: $_SESSION['points']+=0;break;
            }
            
        }
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>gra w wisielca</title>
    <link rel="stylesheet" href="style_gra.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <header class="title">
        <form action="" method="post"><input type="submit" class="back_to_level" name="back_to_level" value="powrót do wyboru poziomu"></form>
        <div class="name">WISIELEC</div> 
        <?php echo '<div class="poziom">poziom: '.$_SESSION['level'].'</div>';?>
    </header>
    <div class="result">
        <?php
            
            for($i=0; $i<strlen($_SESSION['final_word']); $i++){
                if($_SESSION['final_word'][$i]!=" "){
                    echo '<div style="float: left; margin: 10px; border-bottom: 1px solid white;">
                        <input class="field" type="text" maxlength="1" style="max-width:30px;" disabled value="'.$_SESSION['checked'][$i].'" ><br>    
                        </div>
                    ';
                }
                else{
                    echo '<div style="float: left; margin: 10px;">
                        <input class="field" type="text" maxlength="1" style="max-width:30px;" disabled value="'.$_SESSION['checked'][$i].'" ><br>    
                        </div>
                    ';
                }
            }
            echo '<div class="points">punkty: '.$_SESSION['points'].'</div>';
        ?>
         <a href="leaderboard.php"><button class="top10">top 10 graczy</button></a>
    </div><br>
    <div class="inputs">
        <form action="" method="post">
            podaj literę: 
            <input autocomplete ="off" style="margin-left: 20px;" type="text" name="letter" id="" maxlength="1" <?php echo ($_SESSION['photo'] == 9 || $win == True ? 'disabled': "")?>>
            <input type="submit" name = "check" value="Sprawdź" class="btn" <?php echo ($_SESSION['photo'] == 9 || $win == True ? 'disabled style="cursor: default;"': "")?>>
            <input type="submit" name="zakoncz" value="nowe hasło" class="btn">
        </form>
    </div>
    <div class="pojemnik">
        <?php 
        echo $_SESSION['photo'] < 9 ? '<img src = "img/s'.$_SESSION['photo'].'.jpg">': '<img src = "img/s9.jpg"><br>Niestety, przegrałeś :(';
        echo ($win == True ? "<br>Zwycięstwoooo!" : "");
        ?>
    </div>
   
    <?php 
        $db = mysqli_connect("localhost", "root", "", "wisielec");
        $query = "SELECT punkty FROM `uzytkownicy` ORDER BY `uzytkownicy`.`punkty` DESC limit 10";
        $result = mysqli_query($db, $query);
        $results = [];
        while($row = mysqli_fetch_array($result)){
            array_push($results, $row[0]);
        }
        if($win){
            if(($results[sizeof($results)-1]<$_SESSION['points']) or sizeof($results)<10){
                echo '<div class="add_to_db">Twój wynik znalazł się w top 10. Czy chcesz dodać go do bazy? 
                <form action="" method="post">
                <input type="text" autocomplete="off" name="username"">
                <input type="submit" class="add_to_db" name="add_to_db" value="Dodaj do bazy"></form>';
            }
        }
        if(isset($_POST['add_to_db'])){
            $adding_query = 'insert into uzytkownicy (uzytkownik, punkty) values ("'.$_POST['username'].'", '.$_SESSION['points'].') ';
            mysqli_query($db, $adding_query);
            session_destroy();
            header("location: gra.php");
        }
    ?>
</body>
</html>