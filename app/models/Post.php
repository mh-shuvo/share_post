<?php
require_once "Model.php";
class Post extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save($data)
    {
        $this->db->query("INSERT INTO posts (title,body,user_id) VALUES (:title,:body,:user_id)");
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':body',$data['body']);
        $this->db->bind(':user_id',$data['user_id']);
        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function getLatestPosts(){
        $this->db->query('SELECT posts.*,users.name FROM posts join users on users.id = posts.user_id ORDER BY posts.id DESC LIMIT 10');

        if($this->db->execute()){
            return $this->db->resultSet();
        }
        return null;
    }
    public function AllPosts(){
        $this->db->query('SELECT posts.*,users.name FROM posts join users on users.id = posts.user_id ORDER BY posts.id DESC');

        if($this->db->execute()){
            return $this->db->resultSet();
        }
        return null;
    }
}