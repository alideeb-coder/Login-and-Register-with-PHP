<?php 
require_once __DIR__."/../config/database.php";
class User {
    private $conn;
    private $table ='users';
    public function __construct()
    {
        $db=new Database;
        $this->conn=$db->getConnection();
        if($this->conn===null){
            header("location: ../index.php");exit;
        }
    }
    public function FindByEmail($email){
        $query="SELECT * FROM {$this->table} WHERE email=:email LIMIT 1 ";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        return ($stmt->fetch(PDO::FETCH_ASSOC)??false);
    }
    public function Register($username,$email,$password){
        if($this->FindByEmail($email))return false;
        $query="INSERT INTO {$this->table} (name,email,password) VALUES (:name
        ,:email,:password)";
        $stmt=$this->conn->prepare($query);
        $hashed_password =password_hash($password,PASSWORD_DEFAULT);

        $stmt->bindParam(':name',$username);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$hashed_password);
        if($stmt->execute())return true;
        return false;
    }
    public function Login($email,$passord){
        $user=$this->FindByEmail($email);
        if($user&&password_verify($passord,$user['password']))return $user;
        return false;
    }
}


?>
