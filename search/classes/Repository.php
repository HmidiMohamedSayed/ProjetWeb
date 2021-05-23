<?php
include_once 'autoload.php';

class Repository
{
    protected $bd;
    protected $tableName1;
    protected $tableName2;


    public function __construct($tableName1)
    {
        $this->tableName1 = $tableName1;

        $this->bd = ConnexionBD::getInstance();
    }


    public function findAll() {
        $request = "select * from ".$this->tableName1;
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($id) {
        $request = "select * from ".$this->tableName1 ." where id = ?";
        $response =$this->bd->prepare($request);
        $response->execute([$id]);
        return $response->fetch(PDO::FETCH_OBJ);
    }

    public function findByCategory($profession) {
        $request = "select * from ".$this->tableName1 ." where category = ?";
        $response =$this->bd->prepare($request);
        $response->execute([$profession]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
    // Get all comments from database
    public function getAllComments($postid){
        $request = "SELECT * FROM ".$this->tableName1 ." WHERE post_id = ?";
        $response =$this->bd->prepare($request);
        $response->execute([$postid]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function getFullnameByUsername($username){
        $request ="SELECT fullname FROM ".$this->tableName1.", ".$this->tableName2 ." WHERE username= ? LIMIT 1";
        $response =$this->bd->prepare($request);
        $response->execute([$username]);
        return $response->fetchAll(PDO::FETCH_OBJ);

    }
    public function findByUsername($username){
        $request ="SELECT * FROM ".$this->tableName1 ."  WHERE username = ? ";
        $response =$this->bd->prepare($request);
        $response->execute([$username]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    //at
    public function insertComment($post_id,$username,$comment_text){

        $sql = "INSERT INTO comments (post_id, username, body, created_at) VALUES (". $post_id .", " . $username . ", '$comment_text', now()";
        return mysqli_query($this->bd, $sql);

    }
    public function findCommentById($id){
        $request ="SELECT * FROM ".$this->tableName1 ."  WHERE id = ? ";
        $response =$this->bd->prepare($request);
        $response->execute([$id]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    //at

}