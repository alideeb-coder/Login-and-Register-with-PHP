<?php 
class Database{
    private $host="gateway01.us-east-1.prod.aws.tidbcloud.com";
    private $db_name="user_platform";
    private $username="3qXuqz7eF29TbWY.root";
    private $password="";
    private $conn=null;
    public function getConnection(){
        try{
            $this->conn=new PDO(
            "mysql:host={$this->host};dbname={$this->db_name};",
            $this->username,
            $this->password,
            [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ]
        );
        $this->conn->exec("set names utf8");
        } 
        catch(PDOException $exception){
            error_log("failed : ".$exception->getMessage());
        }
        return $this->conn;
    }

}

?>
