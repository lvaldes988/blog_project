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

  $myconection=mysqli_connect("localhost", "root", "", "content");

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

    $thetitle=$__POST['campo_titulo'];
    $thedate=date("Y-m-d H:i:s");
    $thecomment=$__POST['area_comentario'];
    $theimage=($__FILES['image']['name']);


    $myquery = " INSERT INTO CONTENT (Title, Date, Comment, Image) VALUES ('" . $thetitle."', '" . $thedate . "', '" . $thecomment . "', '" . $theimage . "')";

    $result=mysqli_query($$myconection, $myquery);

    /*we close conection*/

    mysqli_close($myconection);

    echo "<br/> you have added the comment sussessfully<br\><br\>"

 ?>

</body>
</html>