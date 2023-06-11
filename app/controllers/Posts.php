<?php
  class Posts extends Controller {
    public function __construct(){}

    public function index(){
      return $this->view("index",["title" => "SharePosts","description" => "Simple social network built on the Custom PHP Framework."]);
    }
    public function about(){
      return $this->view("about",["title" => "About","description" => "App to share posts with other users."]);
    }

  }