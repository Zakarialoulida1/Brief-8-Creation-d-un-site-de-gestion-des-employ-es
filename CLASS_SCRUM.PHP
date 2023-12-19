<?php


class scrummuster extends user
{
    public function add_membre_to_team($userID, $selectedEquipeID, $projectID)
    {
        try {
            $stm = $this->pdo->prepare("UPDATE `users` SET `équipe_ID` = :selectedEquipeID, `project_ID` = :projectID WHERE `Membre_ID` = :userID");

            $stm->bindParam(':selectedEquipeID', $selectedEquipeID, PDO::PARAM_INT);
            $stm->bindParam(':projectID', $projectID, PDO::PARAM_INT);
            $stm->bindParam(':userID', $userID, PDO::PARAM_INT);

            $stm->execute();

            // You can return the number of affected rows or any other relevant information
            return $stm->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function set_NULL_toteam_toproject($delete)
    {
        try {
           
            $stm=$this->pdo->prepare("UPDATE  USERS SET équipe_ID=NULL ,project_ID=NULL WHERE équipe_ID = '$delete'");
            $stm->execute();

            
        } catch (PDOException $e) {
            return $e->getMessage();
        }  
    }


    public function delete_team($deleteequipe)
    {
        try {
            
            $stm2=$this->pdo->prepare("UPDATE  USERS SET équipe_ID=NULL ,project_ID=NULL WHERE équipe_ID = '$deleteequipe'");
            $stm2->execute();

            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetch_users_where_no_team()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM users WHERE roleuser = 'user' and équipe_ID IS NULL ");

            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            return $e->getMessage();
        }
    }
    public function getTeamInfoAndMembers($equipeID)
    {
        try {
            $pdo = $this->pdo;

            // Fetch team members
            $membresQuery = "SELECT * FROM users WHERE équipe_ID = :equipeID";
            $membresStmt = $pdo->prepare($membresQuery);
            $membresStmt->bindParam(':equipeID', $equipeID, PDO::PARAM_INT);
            $membresStmt->execute();
            $membres = $membresStmt->fetchAll(PDO::FETCH_ASSOC);

            // Fetch team information
            $equipeInfoQuery = "SELECT * FROM equipes WHERE équipe_ID = :equipeID";
            $equipeInfoStmt = $pdo->prepare($equipeInfoQuery);
            $equipeInfoStmt->bindParam(':equipeID', $equipeID, PDO::PARAM_INT);
            $equipeInfoStmt->execute();
            $equipeInfo = $equipeInfoStmt->fetch(PDO::FETCH_ASSOC);

            return ['membres' => $membres, 'equipeInfo' => $equipeInfo];
        } catch (PDOException $e) {
            return ['error' => "Error: " . $e->getMessage()];
        }
    }
}


?>