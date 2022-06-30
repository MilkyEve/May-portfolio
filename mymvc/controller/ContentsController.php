<?php
require_once('model/ContactsLogic.php');
require_once('model/ContentsLogic.php');
require_once('model/Output.php');

class ContentController
{
    public function __construct() {
        $this->ContentController = new Conten
        $this->MainController = new MainController();
        $this->contentsLogic = new contentsLogic();
        $this->Output = new Output();
        
    }
    public function __destruct(){}

    public function collectReadContent($id)
{
    $res = $this->contentsLogic->readContent($id);
    $content = $this->Output->createBlog($res[0],$res[1]);
    include 'view/choice.php';
}
public function collectReadAllContent()
{
    $res = $this->contentsLogic->readAllContent();
    $content = $this->Output->createTable($res, "", "readpost");
    include 'view/choice.php';
}
}
?>