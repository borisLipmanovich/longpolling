<?php

class FileDBConnector{
    public function getTimestamp(){
        return filemtime($_SERVER['DOCUMENT_ROOT'].'/data.csv');
    }

    public function getContacts(){
        $contacts = array();
        if (($handle = fopen($_SERVER['DOCUMENT_ROOT'].'/data.csv', "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                $contacts[] = $data;
            fclose($handle);
        }
        return $contacts;
    }
}