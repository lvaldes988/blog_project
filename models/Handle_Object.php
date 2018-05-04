<?php  

    include_once ("Object_Blog.php");
    class Handle_Object {

    private $conection;
    private function __construct ($conection) {

        $this->setConection($conection);

    }

    public function setConetion(PDO $conection) {
        $this->conection=$conection;
    }

    public function getContentByDate() {
         
        $$matriz=array();
        $counter=0;

        $result=$this->conection->query("SELECT * FROM CONTENT ORDER BY DATE");

        while ($register=$result-> fetch(PDO::FETCH_ASSOC)) {
            $blog =new Objet_blog();

            
            $blog->setId($register["id"]);
            $blog->setTitulo($register["Titulo"]);
            $blog->setDate($register["Date"]);
            $blog->setComment($register["Comment"]);
            $blog->setImage($register["Image"]);

            $matriz[$counter]=$blog;

            $counter++;
        }
        return $matriz;
    } 
    
    public function insertContent(Object_Blog $blog) {
    $sql = "INSERT INTO CONTENT (Title, Date, Comment, Image) VALUES ('" . $blog->getTitle() . "' , '" . $blog->getDate() . "' , '" . $blog->getComment() . "','" . $blog->getImage() . "')";
    
        $this->conection->exec($sql);
  }

    }

?>