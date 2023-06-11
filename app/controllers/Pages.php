<?php
  class Pages extends Controller {
    public function __construct(){}

    public function index(){
      return $this->view("posts/index",["title" => "All Posts.php","description" => "Simple social network built on the Custom PHP Framework."]);
    }

  }