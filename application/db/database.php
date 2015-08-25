<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/application/db/fileDBConnector.php');

class Database{
    private static $instance;

    private function __construct(){}

    public static function connect(){
        if(!self::$instance){
            self::$instance = new FileDBConnector();
        }

        return self::$instance;
    }
}