<?php 
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn = null;

    public function __construct() {
        $this->host     = getenv('DB_HOST') ?: "gateway01.us-east-1.prod.aws.tidbcloud.com";
        $this->db_name  = getenv('DB_NAME') ?: "user_platform";
        $this->username = getenv('DB_USER') ?: "3qXuqz7eF29TbWY.root";
        $this->password = getenv('DB_PASS') ?: ""; 
    }

    public function getConnection() {
        $this->conn = null;

        try {
            $dsn = "mysql:host={$this->host};port=4000;dbname={$this->db_name};charset=utf8mb4";
            
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_SSL_CA       => true,
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
            ];

            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            
        } catch(PDOException $exception) {
            error_log("Database Connection Error: " . $exception->getMessage());
            return null;
        }

        return $this->conn;
    }
}
?>
