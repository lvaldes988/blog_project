<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body><h1>WELCOME USER</h1>
<p>this is for regidyered users only</p>
    <?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("Location:login.php");        
    }
    ?>

    <h1>Bienvenido Usuarios</h1>

    <?php
    echo "Hola: " . $_SESSION["usuario"] . "<br><br>";
    ?>


    
</body>
</html>