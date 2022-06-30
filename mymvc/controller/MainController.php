<?php
require_once('model/ContactsLogic.php');
require_once('model/ContentsLogic.php');
require_once('model/Output.php');

class MainController
{
    public function __construct() {
        $this->ContactsLogic = new ContactsLogic();
        $this->contentsLogic = new contentsLogic();
    }
    public function __destruct(){}

    public function handleRequest(){
        try{
            $op = isset($_GET['op']) ? $_GET['op'] : '';
            switch ($op) {
                case 'create':
                    $this->collectCreateContact();
                    break;
                case 'read':
                    $this->collectReadContact($_REQUEST['id']);
                    break;
            
                case 'update':
                    $this->collectUpdateContact($_REQUEST['id']);
                    break;
            
                case 'delete':
                   $this->collectDeleteContact($_REQUEST['id']);
                    break;
            
                case 'search':
                    $this->collectSearchContact($_REQUEST['searchterm']);
                    break;
                
                case'choice':
                    $msg = "read content page";
                    $this->collectReadAllContent();
                    break;
                case'readpost':
                    $msg = "choice page";
                    $this->collectReadContent($_REQUEST['id']);
                    break;

                default:
                $this->collectReadAllContacts();
                    break;
                    
            }
        }catch (Exception $e){
            throw $e;
        }
    }
}