<?php

class Viewer{
    private static $model;

    public static function view($viewName, $model = null){
        self::$model = $model;

        $path = $_SERVER['DOCUMENT_ROOT'].'/'.'application/views/'.$viewName;
        if(file_exists($path.'.php')){
            require_once($path.'.php');
        }elseif(file_exists($path.'.html')){
            require_once($path.'.html');
        }
    }
    public static function getModel(){
        return self::$model;
    }
}