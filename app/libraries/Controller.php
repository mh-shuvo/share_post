<?php

/**
 * Core Controller
 * Load View
 * Load Model
 */


 class Controller{
    // Load model
    public function model($model){
        // Require model file
        require_once '../app/models/'.$model.'.php';

        //Instantiate model
        return new $model();
    }

    // Load view
    public function view($view,$data=[]){
        $view = str_replace(".","/",$view);
        //check for view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            // View does not exists
            die(sprintf('The View file [%s] could not be found.', $view));
        }
    }
 }