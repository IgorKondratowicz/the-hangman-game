<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Odibee Sans', cursive;
            color: white;
            background: black;
        }
        .title{
            width: 100%;
            height: 200px;
            color: white;
            font-size: 100px;
            text-align: center;
            overflow: hidden;
        }

        .buttons{
            width: 100%;  
            margin-top: 50px;
            display:flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
        }
        button{
            width: 150px;
            height: 50px;
            margin: 30px;
            font-size: 30px;
            background: none;
            border: 2px solid white;
            border-radius: 40px;
            color: white;
            cursor: pointer;
            outline: none;
            text-transform: uppercase;
        }
        img{
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 150px;
        }
    </style>
</head>
<body>
    <header class="title">
        <div class="name">WISIELEC</div> 
    </header>
    <div class="buttons">
        Wybierz poziom gry: 
        <form action="" method="post">
            <button type="submit" value="latwy" name="submit">łatwy</button>
            <button type="submit" value="sredni" name="submit">średni</button>
            <button type="submit" value="trudny" name="submit">trudny</button>
        </form>
    </div>

    <?php
        
        if(isset($_POST['submit'])){
            if(isset($_SESSION['level'])){
                session_destroy();
            }
            else{
               session_start();
                $_SESSION['level'] = $_POST['submit'];
                header("location: gra.php"); 
            }
            
        }
        
    ?>
    <img src="img/s9.jpg" alt="" srcset="">
</body>
</html>