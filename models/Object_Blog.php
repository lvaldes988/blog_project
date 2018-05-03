<?php

class Object_Blog {
  //object atributes//
    private $id;
    private $Title;
    private $Date;
    private $Comment;
    private $Image;

      //access methosds
      public function getId() {
        return $this->id;
    }

    public function setId($id) {

        $this->id=$id;
    }  
       
    public function getTitle() {
        return $this->Title;
    }

    public function setTitle($Title) {

        $this->Title=$Title;
    }  

    public function getDate() {
        return $this->Date;
    }

    public function setDate($Date) {

        $this->Date=$Date;
    }  

    public function getComment() {
        return $this->Comment;
    }

    public function setComment($Comment) {

        $this->Comment=$Comment;
    }  

    public function getImage() {
        return $this->Image;
    }

    public function setImage($Image) {

        $this->Image=$Image;
    }  


}

?>