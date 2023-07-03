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
    public function getLatestPosts($start=0,$length=10){
        $this->db->query('SELECT posts.*,users.name FROM posts join users on users.id = posts.user_id ORDER BY posts.id DESC LIMIT :start,:length');
        $this->db->bind(":start",$start);
        $this->db->bind(":length",$length);

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
    public function getPostById($id){
        $this->db->query('SELECT posts.*,users.name FROM posts join users on users.id = posts.user_id WHERE posts.id = :id');
        $this->db->bind(':id',$id);

        if($this->db->execute()){
            return $this->db->single();
        }
        return null;
    }
}