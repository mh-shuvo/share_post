<?php

class Posts extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $latestPosts = $this->postModel->AllPosts();
        return $this->view("posts/index", $latestPosts);
    }

    public function create()
    {
        $data = [
            'title' => '',
            'body' => '',
            'user_id' => auth()->id()
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            /**
             * @var $hasError is used to determine any error has in the post data.
             */

            $hasError = false;

            //Sanitize POST data

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = array_merge($data, $_POST);

            if (empty($data['title'])) {
                $data['title_err'] = "Title field is required";
                $hasError = true;
            }
            if (empty($data['body'])) {
                $data['body_err'] = "Body field is required";
                $hasError = true;
            }

            if (!$hasError) {
                echo "Data Successfully Saved.";
                if ($this->postModel->save($data)) {
                    session()->flash("post_save_success", "You'r Post Successfully Published.");
                    redirect('/');
                } else {
                    die("Something went wrong");
                }
            }
        }

        return $this->view('posts/create', $data);
    }

    public function single($id)
    {
        $post = $this->postModel->getPostById($id);
        return $this->view('posts/single',$post);
    }

}