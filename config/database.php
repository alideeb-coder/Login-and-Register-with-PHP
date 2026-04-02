<?php 
class Database{
    private $host="gateway01.us-east-1.prod.aws.tidbcloud.com";
    private $db_name="user_platform";
    private $username="3qXuqz7eF29TbWY.root";
    private $password="";
    private $conn=null;
    public function __construct() {
        $this->host     = getenv('DB_HOST');
        $this->db_name  = getenv('DB_NAME');
        $this->username = getenv('DB_USER');
        $this->password = getenv('DB_PASS');
    }
    public function getConnection(){
        try{
            $this->conn = new PDO(
                "mysql:host={$this->host};port=4000;dbname={$this->db_name};",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_SSL_CA => true 
                ]
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
