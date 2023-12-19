<?php
require_once("signupconfig.php");
require_once("database.php");


class productowner extends user
{

    public function createproject()
    {
    }

    public function deleteproject($project_ID)
    {

        try {
            $stm = $this->pdo->prepare("DELETE FROM projects WHERE project_ID = :project_ID");
            $stm->bindParam(':project_ID', $project_ID, PDO::PARAM_INT);
            $stm->execute();
            echo "Project deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function fetchAll()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM users WHERE roleuser IN ('user', 'scrummuster') ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            return $e->getMessage();
        }
    }



   





    public function update_scrum_muster_project($selectedProjectID, $scrummuster)
    {
        try {
            $stm = $this->pdo->prepare("UPDATE `users` SET `project_ID` = '$selectedProjectID' WHERE `Membre_ID` = '$scrummuster'");
            $stm->execute();
            echo "Project assignment updated successfully.";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function assign_user_as_scrummuster($role, $id)
    {

        try {
            $stm = $this->pdo->prepare("UPDATE Users SET roleuser='$role', project_ID=NULL  where Membre_ID= '$id'");
            $stm->execute();

            header("Location: dashboardadmin.php?success=1");
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}









?>