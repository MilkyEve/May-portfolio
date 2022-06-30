<?php
require_once 'model/DataHandler.php';

class contentsLogic
{
public function __construct()
{
    $this->DataHandler = new DataHandler("localhost", "mysql", "mvc", "root", "" );
    $this->Output = new output();
}
public function __destruct()
{

}
public function readImages($id){
    $returnarray = [];

    $sql = "SELECT images From content Where id=".$id;
    $result = $this->DataHandler->readsData($sql);
    $content = $result->fetchAll();

    $images = explode("," , $content[0]['images']);
    foreach($images as $imageId)
    {
        $sql = "SELECT * FROM images WHERE id=" .$imageId;
        $result = $this->DataHandler->readsData($sql);
        $img = $result->fetchAll();

        foreach($img as $strings => $val){
            foreach($val as $image){
                if(is_string($image)){
                    array_push($returnarray,$image);
                }
            }
        }
    }
    return $returnarray;
}
public function readContent($id)
{
    $sql = "SELECT id, auteur, titel, content, social, datum FROM content WHERE id=$id";
    $result = $this->DataHandler->readsData($sql);
    $res = $result->fetchAll();
    $img = $this->readImages($id);
    return [$res,$img];
}
public function ReadAllContent()
{
    try {
            $sql = "SELECT id, auteur, titel, datum FROM content";
            $res = $this->DataHandler->readsData($sql);
            return $res;
    } catch (Exception $e) {
        throw $e;
    }
}

}