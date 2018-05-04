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
    
    
    include ("../models/Handle_Object.php");


    try{

        $myconection = new PDO('mysql:host=localhost;
        dbname= dbblog', 'root', '');
    
        $myconection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $Handle_Object = new Handle_Object($myconection);

            $table_blog = $Handle_Object->getContentByDate();

            if(empty($table_blog)) {
                 echo "there are no entries yet";
            }else{
                foreach($table_blog as $values) {

                    echo "<h3>" . $values->getTitle() . "</h3>";

                    echo"<h4>" . $values->getDate() . "</h4>";

                    echo "div style='width:400px'>";

                    echo"<h4>" . $values->getComment() . "</div>";

                    if($values->getImage() !="") {
                        echo "<img src='../images/";
                        echo $values->getImage() . "' width='300px' height='200px'/>";
                    }
                }
                echo "<hr/>";
            }

    }catch (Exception $e) {

        die("Error: " . $e->getMessage());
    }
        




?>
<a href="Formulario.php">get nack to insert page</a>
</body>
</html>


