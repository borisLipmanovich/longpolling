<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/application/modules/iaddressBook.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/application/db/database.php');

class AddressBook implements IAddressBook{

    public function getTimestamp(){
        $db = Database::connect();
        return $db->getTimestamp();
    }

    public function get(){
        $db = Database::connect();
        return $db->getContacts();
    }

    public function create(IAddressBook $contact){
        $contact->create($contact);
    }

    public function delete(IAddressBook $contact){
        $contact->delete($contact);
    }
}