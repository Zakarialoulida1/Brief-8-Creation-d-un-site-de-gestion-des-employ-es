<?php
require_once("database.php");

class team
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function create_team($teamName, $projectID, $scrumMasterID) {
        try {
            $stm = $this->pdo->prepare("INSERT INTO equipes (Date_de_Création, Nom_Équipe, project_ID, scrummuster_id)
                VALUES (CURRENT_DATE(), :teamName, :projectID, :scrumMasterID)");

            $stm->bindParam(':teamName', $teamName, PDO::PARAM_STR);
            $stm->bindParam(':projectID', $projectID, PDO::PARAM_INT);
            $stm->bindParam(':scrumMasterID', $scrumMasterID, PDO::PARAM_INT);

            $stm->execute();

            // Assuming you want to get the last inserted ID
            $lastInsertId = $this->pdo->lastInsertId();

            // You can return the last inserted ID or any other relevant information
            return $lastInsertId;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetch_my_teams($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM equipes where scrummuster_id = :id");
            $stm->bindParam(':id', $id, PDO::PARAM_INT);
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetch_myteam($monequipe)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM equipes WHERE équipe_ID=:id ");
            $stm->bindParam(':id', $monequipe, PDO::PARAM_INT);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetch_project_id_from_team($monequipe) {
        try {
            $stm = $this->pdo->prepare("SELECT project_ID FROM equipes WHERE équipe_ID = :id");
            $stm->bindParam(':id', $monequipe, PDO::PARAM_INT);
            $stm->execute();

             

            return  $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            return $e->getMessage();
        }
    }


    public function create_project($projectName, $description, $startDate, $endDate)
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO Projects (Nom_project, descrip, Date_de_debut, date_fin) 
                VALUES (:projectName, :description, :startDate, :endDate)");


            $stm->bindParam(':projectName', $projectName, PDO::PARAM_STR);
            $stm->bindParam(':description', $description, PDO::PARAM_STR);
            $stm->bindParam(':startDate', $startDate, PDO::PARAM_STR);
            $stm->bindParam(':endDate', $endDate, PDO::PARAM_STR);

            $stm->execute();

            $lastInsertId = $this->pdo->lastInsertId();

            // Redirect to dashboardadmin.php on success
            header("Location: dashboardadmin.php?success=1");
            exit();
        } catch (PDOException $e) {
            // Redirect to dashboardadmin.php with an error parameter on failure
            header("Location: dashboardadmin.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }
}
