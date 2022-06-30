<?php
require_once 'model/DataHandler.php';

class ContactsLogic{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost","mysql","mvc","root","");
        $this->Output = new output();
    }
    public function __destruct() { }

    public function createContact(){
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $location = $_POST["location"];

        if (empty($name) or empty($phone) or empty($email) or empty($location)) {
            $msg = "Alle velden zijn vereist";
        } else {
            $sql = "INSERT INTO contacts (name, phone, email, location) 
        VALUES('$name', '$phone', '$email', '$location')";
            $lastid = $this->DataHandler->createData($sql);
            $result = $this->readContact($lastid);
            $res = $result->fetchAll();
            //laat weten of het gelukt is en laat het  resultaat zien
            return $res;
        }

    }

    public function readContact($id){
        try {
            $sql = "SELECT * FROM contacts WHERE id=" .$id;
            return $this->DataHandler->readsData($sql);
        }catch(Exception $e){
            throw $e;
        }

    }

    public function readAllContacts(){
        try {
            $sql = "SELECT * FROM contacts";
            return $this->DataHandler->readsData($sql);
        }catch(Exception $e){
            throw $e;
        }
    }

    public function updateContact($id, $name, $phone, $email, $location)
    {
        $sql = "UPDATE contacts SET name= '$name', phone= '$phone', email = '$email', location= '$location' WHERE id=$id";
        $result = $this->DataHandler->updateData($sql);
        return	$result;
    }

    public function deleteContact($id)
    {
        $sql = "DELETE  FROM contacts WHERE id=".$id;
        $result = $this->DataHandler->deleteData($sql);
        return $result;
    }
    public function searchContact($search)
    {
        $sql = "SELECT * FROM contacts where id LIKE '%$search%' OR name LIKE '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%' OR location LIKE '%$search%'";
        $result = $this->DataHandler->readsData($sql);
        $res = $result->fetchAll();
            if($result->rowCount() > 0){ 
                $contact = $this->Output->createTable($res,'search');
            }else{
                $contact = "0 records found!";
            }
        return $contact;
    }

}
?>