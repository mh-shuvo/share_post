<?php
  class Pages extends Controller {
    public function __construct(){}

    public function index(){
      return $this->view("index",["title" => "Welcome to the PHPMVC"]);
    }

  }