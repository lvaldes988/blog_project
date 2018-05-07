<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
     try {
         $base = new PDO(
             "mysql:host=localhost;
             dbname=dbblog",
             "root", "");

        $base->setAttribute(PDO::ATR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM USERS_PASSWORD WHERE USERS= :login AND PASSWORD= : password";
        $result = $base->prepare($sql);
        $login=htmlentities(addslashes($_POST["login"]));
        $login=htmlentities(addslashes($_POST["password"]));
        $result->bindValue(":login", $login);
        $result->bindValue(":password", $password);
        $result->execute();
        $register_number=$result->rowCount();

        if($register_number!=0) {
            session_start();

            $_SESSION["users"]=$_POST["login"];
            //echo "<h2>adelante";
            header("Location:registered_users.php");
        }else{
            header("location:login.php");//this will maintain the user in the login page
        }

     }catch(Exception $e) {

        die ("Error: " . $e->getMessage());
     }

    ?>
</body>
</html>