<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getLatestPosts();
        return $this->view(
            "index",
            [
                "title" => "SharePosts",
                "description" => "Simple social network built on the Custom PHP Framework.",
                "posts" => $posts
            ]
        );
    }

    public function about()
    {
        return $this->view("about", ["title" => "About", "description" => "App to share posts with other users."]);
    }

}