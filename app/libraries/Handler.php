<?php

class Handler{

    public static function assets($path){
        echo URLROOT.'/'.$path;
    }

    public static function include($path,$ext="php"){
        $view = APPROOT.'/views/'.static::parseViewUrl($path).".".$ext;
        include_once $view;
        if(file_exists($view)){
            include_once $view;
        }else{
            die(sprintf("The view file [%s] could not found.",$view));
        }
    }

    private static function parseViewUrl($url){
        $view = str_replace(".","/",$url);
        return $view;
    }
}