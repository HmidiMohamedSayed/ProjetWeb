<?php
include_once 'ConnexionBD.php';
session_start();
class Repository
{
    protected $bd;
    protected $tableName;
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->bd = Connexionbd::getInstance();
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
    public function insertpost($sub, $des)
    {

        $currentDate = date('Y-m-d');
        $req = $this->bd->prepare("insert into `table_posts` (`Subject`, `Description`,`Date`,`ID_user`) VALUES (:val1,:val2,:val3,:val4)");
        $req->execute(array('val1' => $sub, 'val2' => $des, 'val3' => $currentDate,'val4'=>$this->getIdUser()));
    }

    public function getIdUser(){
        $request= "select ID from `table_infos_worker` where `username`=:val1 and `password`=:val2";
        $response = $this->bd->prepare($request);
        $response->execute(['val1'=>$_SESSION['username'],'val2'=>$_SESSION['password']]);
        return $response->fetch(PDO::FETCH_OBJ);
    }
    public function FunctionName()
    {
        $_SESSION['id']=$this->getIdUser();
    }
}
