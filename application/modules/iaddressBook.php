<?php

interface IAddressBook{
    public function getTimestamp();
    public function get();
    public function create(IAddressBook $contact);
    public function delete(IAddressBook $contact);
}