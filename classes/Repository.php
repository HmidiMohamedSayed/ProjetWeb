<?php
include_once 'ConnexionBD.php';

class Repository
{
    protected $bd;
    protected $tableName;
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->bd = Connexionbd::getInstance();
    }
    public function find()
    {
        $request = "select username from " . $this->tableName;
        $response = $this->bd->prepare($request);
        $response->execute([]);
        return $response;
    }
    public function findAll()
    {
        $request = "select * from " . $this->tableName;
        $response = $this->bd->prepare($request);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($id)
    {
        $request = "select * from " . $this->tableName . " where id = ?";
        $response = $this->bd->prepare($request);
        $response->execute([$id]);
        return $response;
    }
    public function findAllPosts()
    {   
        $response = $this->bd->query("select * from " . $this->tableName );
        return $response;
    }
    public function findPosts($username){
      $request= "select * from ". $this->tableName . " where username = ?";
      $response= $this->bd->prepare($request);
      $response->execute([$username]);
      return $response;

    }
    public function insertpost($location, $description)
    {
        session_start();
        $currentDate = date('Y-m-d');
        $req = $this->bd->prepare("insert into `posts` (username,description,profession,date,location) VALUES (:val1,:val2,:val3,:val4,:val5)");
        $req->execute(array('val1' => $_SESSION['username'], 'val2' => $description,'val3'=>$_SESSION['occupation'],'val4' => $currentDate,'val5'=>$location));
    }
    
    public function getIdUser(){
        session_start();
        $request= "select ID from `table_infos_worker` where `username`=:val1 and `password`=:val2";
        $response = $this->bd->prepare($request);
        $response->execute(['val1'=>$_SESSION['username'],'val2'=>$_SESSION['password']]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    
    public function ajouterWorker($username,$password,$fullname,$email,$phonenumber,$gender,$occupation,$birthdate)
    {
        $request = "INSERT INTO " . $this->tableName . " (username,password,fullname,email,phonenumber,gender,occupation,birthdate) VALUES(?,?,?,?,?,?,?,?)";
        $response = $this->bd->prepare($request);
        $response->execute([$username,$password,$fullname,$email,$phonenumber,$gender,$occupation,$birthdate]);
        // return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function ajouterClient($fullname, $username,$email,$phonenumber,$password,$gender,$birthdate)
    {
        $request = "INSERT INTO " . $this->tableName . " (fullname,username,email,phonenumber,password,gender,birthdate) VALUES(?,?,?,?,?,?,?)";
        $response = $this->bd->prepare($request);
        $response->execute([$fullname, $username,$email,$phonenumber,$password,$gender,$birthdate]);
        // return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function findByUsername($username)
    {
        $request = "select * from " . $this->tableName . " where username = ?";
        $response = $this->bd->prepare($request);
        $response->execute([$username]);
        return $response->fetch(PDO::FETCH_OBJ);
    }

    public function supprimer($firstname1,$name1,$age1)
    {
        $request = "DELETE from " . $this->tableName . " where name=? and firstname=? and age=?" ;
        $response = $this->bd->prepare($request);
        $response->execute([$name1,$firstname1,$age1]);
    }
    public function modifier($firstname2,$name2,$age2,$firstname1,$name1,$age1)
    {
        $request = "UPDATE ". $this->tableName . "
       SET firstname = ? ,name=?, age=? WHERE firstname=? and name=? and age=?";
        $response = $this->bd->prepare($request);
        $response->execute([$firstname2,$name2,$age2,$firstname1,$name1,$age1]);
    }
    public function findByOccupation($occupation){
        $request= "select * from ". $this->tableName . " where profession = ?";
      $response= $this->bd->prepare($request);
      $response->execute([$occupation]);
      return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function findMessageByUsername($username)
    {
        $request = "select * from " . $this->tableName . " where destination = ?";
        $response = $this->bd->prepare($request);
        $response->execute([$username]);
        return $response;
    }
    public function findMessage($username)
    {
        $request = "select * from " . $this->tableName . " where destination = ? or source= ?";
        $response = $this->bd->prepare($request);
        $response->execute([$username,$username]);
        return $response;
    }
    public function findMessageByDoubleUsername($usernamesource,$usernamedestiantion)
    {
        $request = "select * from " . $this->tableName . " where (destination = ? and source=?) or (destination=? and source =?)";
        $response = $this->bd->prepare($request);
        $response->execute([$usernamesource,$usernamedestiantion,$usernamedestiantion,$usernamesource]);
        return $response;
    }
    public function ajouterMessage($source,$destination,$content)
    {
        $currentdsatetime=date("Y-m-d h:i:s");
        $request = "INSERT INTO " . $this->tableName . " (source,destination,content,date) VALUES(?,?,?,?)";
        $response = $this->bd->prepare($request);
        $response->execute([$source,$destination,$content,$currentdsatetime]);
        // return $response->fetchAll(PDO::FETCH_OBJ);
    }
}
