<?php 

require_once("database.php");
class project{

    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchallproject()
    {

        try {
            $stm = $this->pdo->prepare("SELECT * FROM projects");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetch_one_project($project_ID){
        try{
            $stm=$this->pdo->prepare("SELECT * from projects where project_ID= '$project_ID'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            return $e->getMessage();
        }

    }
}
?>