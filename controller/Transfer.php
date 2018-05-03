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

include ("../models/Object_Blog.php");
include ("../models/Handle_Object.php");

try{

    $myconection = new PDO('mysql:localhost;
    dbname= dbblog', 'root', '');

    $myconection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



/*test connection*/

    if (!$myconection) {
        echo "concextionfailed" . mysqli_error();

        exit();
    }
    if($__FILES['image']['name']) {
        switch ($__FILES['image']['name']) {
            case 1: //error eccess size fot php.ini
            echo "the image size is too big";
            break;

            case 2: //file size is set by prevous form
            echo "file size is out of contenct";
            break;

            case 3: //file corrupted
            echo "the wanted file coulnt be uploaded";
            break;

            case 4: //no file found
            echo "no file has benn found";
            break;

        }

    }else {
        echo "file uploaded susscefully<br/>";

        if((isset($__FILES['image']['name']) && ($__FILES['image']['error']==UPLOAD_ERR_OK))) {
            $destity_of_route = "images/";

            move_uploaded_file($__FILES['image']['tmp_name'], $destity_of_route . $__FILES['image']['name']);

            echo "The file" . $__FILES['image']['name'] . "has been copied sussccefully";

        }else{
            "the file coundnt be uploaded";

        }
    }
   
    $Handle_Object = new Handle_Object($myconection);

    $blog = new Object_Blog;

    $blog->setTitle(thmlentities(addslashes($POST["campo_titulo"]), ENT_QUOTES));
    $blo->setDate(Date("Y-m-d H:i:s"));
    $blog->setComment(thmlentities(addslashes($POST["area_comentarios"]), ENT_QUOTES));
    $blog->setImage($__FILES["image"]["name"]);


    $Handle_Object->insertContent($blog);

    echo "<br/> your entrance has benn added to the blog susscefully<br/>";

    
 }catch (Exception $e) {

    die("Error: " . $e->getMessage());
}

?> 
</body>
</html>