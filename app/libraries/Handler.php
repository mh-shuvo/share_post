<?php

class Handler{

    private function __construct(){}

    public static function assets($path){
        return URLROOT.'/'.$path;
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

    public static function getPageTitle()
    {
        return session()->has(PAGE_TITLE_KEY) ? session()->get(PAGE_TITLE_KEY) : SITENAME;
    }
    public static function setPageTitle($value=SITENAME)
    {
        session()->put(PAGE_TITLE_KEY,$value);
    }
}