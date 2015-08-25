<?php

class Contact implements IAddressBook{
    private $id;
    private $name;
    private $phone;

    public function __construct($id, $name, $phone){
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
    }

    public function getTimestamp(){
        //get timestamp
    }

    public function get(){
        throw new Exception('Unrealized method');
    }

    public function create(IAddressBook $contact){
        //create contact
    }

    public function delete(IAddressBook $contact){
        //delete
    }
}