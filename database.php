<?php
// if(!defined("DB_TYPE")){
//     define("DB_TYPE","mysql");
// }


// if(!defined("DB_HOST")){
//     define("DB_HOST","localhost");
// }
// if(!defined("DB_NAME")){
//     define("DB_NAME","brief8");
// }
// if(!defined("DB_PWD")){
//     define("DB_PWD","");
// }
// if(!defined("DB_USER")){
//     define("DB_USER","root");
// }



class Database {
    private $host;
    private $dbname;
    private $user;
    private $password;
    protected $pdo;

    public function construct($host, $dbname, $user, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
    }
    public function connect() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function getPDO() {
        return $this->pdo;
    }
}
$database = new Database();
$database->construct('localhost', 'brief8', 'root', '');
$database->connect();
$pdo = $database->getPDO();
?>