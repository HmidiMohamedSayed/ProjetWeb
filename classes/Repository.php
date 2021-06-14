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
    public function insertpost($location, $description,$username,$occupation)
    {
        $currentDate = date('Y-m-d');
        $request= "insert into ".$this->tableName . " (`username`,`description`,`profession`,`date`,`location`) VALUES (?,?,?,?,?)";
        $response = $this->bd->prepare($request);
        $response->execute([$username,$description,$occupation, $currentDate,$location]);
    }
    public function insertpostpic($location, $description,$filename,$username,$occupation)
    {
        $currentDate = date('Y-m-d');
        $req = $this->bd->prepare("insert into `posts` (username,description,profession,date,location,picture) VALUES (?,?,?,?,?,?)");
        $req->execute([$username,$description,$occupation, $currentDate,$location,$filename]);
    }
    public function insertpostfile($location, $description,$filename,$username,$occupation)
    {
        $currentDate = date('Y-m-d');
        $req = $this->bd->prepare("insert into `posts` (username,description,profession,date,location,file) VALUES (?,?,?,?,?,?)");
        $req->execute(array($username,$description,$occupation, $currentDate,$location,$filename));
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
    public function findByUsername1($username)
    {
        $request = "select * from " . $this->tableName . " where username = ?";
        $response = $this->bd->prepare($request);
        $response->execute([$username]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }

    public function supprimer($firstname1,$name1,$age1)
    {
        $request = "DELETE from " . $this->tableName . " where name=? and firstname=? and age=?" ;
        $response = $this->bd->prepare($request);
        $response->execute([$name1,$firstname1,$age1]);
    }

    public function findByOccupation($occupation){
        $request= "select * from ". $this->tableName . " where profession = ?";
      $response= $this->bd->prepare($request);
      $response->execute([$occupation]);
      return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function ChangePassword($username,$NewPassword){
     $request= "Update ". $this->tableName . " Set `password` = ? where username= ?";
       $response = $this->bd->prepare($request);
       $response->execute([$NewPassword,$username]);
       
    }
    public function ChangeInfo($bio,$birthdate,$phonenumber,$username){
        $request= "Update ". $this->tableName . " Set `bio` = ?,`birthdate` = ?,`phonenumber` = ? where username= ?";
          $response = $this->bd->prepare($request);
          $response->execute([$bio,$birthdate,$phonenumber,$username]);
          
       }
       public function ChangeGeneral($fullname,$email,$username){
        $request= "Update ". $this->tableName . " Set `fullname` = ?,`email` = ? where username= ?";
          $response = $this->bd->prepare($request);
          $response->execute([$fullname,$email,$username]);
          
       }
       public function ModifyPost($location,$description,$id){
        $request= "Update ". $this->tableName . " Set `location` = ?,`description` = ?,`date` = ? where id= ?";
        $response = $this->bd->prepare($request);
        $response->execute([$location,$description,date('Y-m-d'),$id]);
       }
       public function DeletePost($id){
        
            $request = " DELETE from `posts` where `id` = ? " ;
            $response = $this->bd->prepare($request);
            $response->execute([$id]);

       }
       public function UploadFile($filename,$username){
           $request="Update " . $this->tableName . " Set `picture` = ? where username = ? ";
           $response= $this->bd->prepare($request);
          
           $response->execute([$filename,$username]);
       }
       public function getfilename($username){
           $request="Select picture from " . $this->tableName . " where username = ? ";
           $response = $this->bd->prepare($request);
           $response->execute([$username]);
           return $response->fetchObject();
       }
       public function ConfirmEmail($username){
              $request="Update ".$this->tableName . " Set confirmed=1 where username=?";
              $response= $this->bd->prepare($request);
              $response->execute([$username]);
       }
       public function getconfirmed($username){
        $request="Select confirmed from " . $this->tableName . " where username = ? ";
        $response = $this->bd->prepare($request);
        $response->execute([$username]);
        return $response->fetchObject();
    }
    public function getemail($username){
        $request="Select email from " . $this->tableName . " where username = ? ";
        $response = $this->bd->prepare($request);
        $response->execute([$username]);
        return $response->fetchObject();
    }
    public function getpics($username){
        $request="Select picture from " .$this->tableName . " where username = ? ";
        $response = $this->bd->prepare($request);
        $response->execute([$username]);
        return $response;
    }
   public function getratings($username){
       $request = "Select * from " .$this->tableName . " where username_worker = ? ";
       $response = $this->bd->prepare($request);
       $response->execute([$username]);
       return $response->fetchAll(PDO::FETCH_OBJ);
   }
  public function setrating($rating,$usernameC,$usernameW,$review){
    $request = "Insert into " .$this->tableName . " (username_client,username_worker,rating,review) VALUES (?,?,?,?) ";
    $response = $this->bd->prepare($request);
    $response->execute([$usernameC,$usernameW,$rating,$review]);
    return $response->fetchObject();
  }
  public function getpicture($username){
    $request="Select picture from " .$this->tableName . " where username = ? ";
    $response = $this->bd->prepare($request);
    $response->execute([$username]);
    return $response->fetch(PDO::FETCH_OBJ);
  }    
  public function getaveragerating($username){
    $request= "Select Round(AVG(rating),1) as averagerating from " .$this->tableName . " where username_worker= ? ";
    $response = $this->bd->prepare($request);
    $response->execute([$username]);
    return $response->fetchObject();

  }

}
