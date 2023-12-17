<?php
require_once("database.php");



class user
{

    public $id;
    private $username;
    private $userlastname;
    private $email;
    private $password;
    private $phonenumber;
    private $role;
    private $img;
    public $team_id;
    public $project_ID;
    // protected $dbcnx;

    public function __construct($id = 0, $username = '', $userlastname = '', $email = '', $password = '', $role = '', $img = '', $phonenumber = 0)
    {
        $this->id = $id;
        $this->username = $username;
        $this->userlastname = $userlastname;
        $this->email = $email;
        $this->password = $password;
        $this->phonenumber = $phonenumber;;
        $this->role = $role;
        $this->img = $img;
    }


    function connectToDatabase()
    {
        try {
            $pdo = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            // You might want to handle the exception in a way that makes sense for your application
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Example usage:

    // Now you can use $pdo for your database operations


    public function setid($id)
    {
        $this->id = $id;
    }
    public function getid()
    {
        return $this->id;
    }

    public function setusername($username)
    {
        $this->username = $username;
    }
    public function getusername()
    {
        return $this->username;
    }
    public function setuserlastname($userlastname)
    {
        $this->userlastname = $userlastname;
    }
    public function getuserlastname()
    {
        return $this->userlastname;
    }
    public function setemail($email)
    {
        $this->email = $email;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setpassword($password)
    {
        $this->password = $password;
    }
    public function getpassword()
    {
        $this->password;
    }


    public function setphonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }

    public function getphonenumber()
    {
        return $this->phonenumber;
    }
    public function set_team_id($team_id)
    {
        $this->team_id = $team_id;
    }
    public function get_team_id()
    {
        return $this->team_id;
    }

    public function setrole($role)
    {
        $this->role = $role;
    }
    public function getrole()
    {
        return $this->role;
    }
    public function setimg($img)
    {
        $this->img = $img;
    }
    public function set_project_id($project_ID)
    {
        $this->project_ID = $project_ID;
    }
    public function get_project_id()
    {
        return $this->project_ID;
    }
    public function getimg()
    {
        return $this->img;
    }
    public function insertdata()
    {
        $stm = $this->connectToDatabase()->prepare("INSERT INTO users (prénom, nom, téléphone, email, motdepasse, roleuser, image) VALUES (?, ?, ?, ?, ?, ?, ?)");

        if (!$stm) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->connectToDatabase()->errorInfo());
            exit;
        }

        $stm->execute([$this->username, $this->userlastname, $this->phonenumber, $this->email, $this->password, $this->role, $this->img]);

        if ($stm->errorCode() != '00000') {
            $errors = $stm->errorInfo();
            echo "PDO error: " . $errors[2];
        } else {
            echo "Data saved successfully";
        }
    }


    // public function update(){
    //     $stm=$this->dbcnx->prepare("")
    // }


    /***************************************** */

    public function authenticateUser($email, $password)
    {
        $email = $this->validate($email);
        $password = $this->validate($password);


        if (empty($email) || empty($password)) {
            return "Error: User Name and Password are required";
        }

        try {
            //     var_dump($password);
            // die();
            $stmt = $this->connectToDatabase()->prepare("SELECT * FROM users WHERE email =:email ");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);




            if (password_verify($password, $row['motdepasse'])) {

                $this->setSessionVariables($row);
                $this->redirectToDashboard($row['roleuser']);
            } else {
                return "Error: Incorrect User name or password";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }


    public function setSessionVariables($row)
    {
        session_start();
        $_SESSION['nom'] = $row['nom'];
        $_SESSION['prénom'] = $row['prénom'];
        $_SESSION['Membre_ID'] = $row['Membre_ID'];
        $_SESSION['roleuser'] = $row['roleuser'];
        $_SESSION['équipe_ID'] = $row['équipe_ID'];
        $_SESSION['project_ID'] = $row['project_ID'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['téléphone'] = $row['téléphone'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['motdepasse'] = $row['motdepasse'];
    }


    public function redirectToDashboard($role)
    {

        $dashboard = $this->getDashboardURL($role);

        // var_dump( $dashboard);
        // die();

        header("Location: $dashboard");
        exit();
    }

    public function getDashboardURL($role)
    {
        switch ($role) {
            case 'PO':
                return "dashboardadmin.php";
            case 'scrummuster':
                return "dashboardscrummuster.php";
            default:
                return "dashboarduser.php";
        }
    }

    private function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
class productowner extends user
{

    public function createproject()
    {
    }
    public function fetchallproject()
    {

        try {
            $stm = $this->connectToDatabase()->prepare("SELECT * FROM projects");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function deleteproject($project_ID)
    {

        try {
            $stm = $this->connectToDatabase()->prepare("DELETE FROM projects WHERE project_ID = :project_ID");
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
            $stm = $this->connectToDatabase()->prepare("SELECT * FROM users WHERE roleuser IN ('user', 'scrummuster') ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            return $e->getMessage();
        }
    }



    public function fetchone($id)
    {
        try {
            $stm = $this->connectToDatabase()->prepare("SELECT * from users where id=?");
            $stm->execute([$id]);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            return $e->getMessage();
        }
    }





    public function update_scrum_muster_project($selectedProjectID, $scrummuster)
    {
        try {
            $stm = $this->connectToDatabase()->prepare("UPDATE `users` SET `project_ID` = '$selectedProjectID' WHERE `Membre_ID` = '$scrummuster'");
            $stm->execute();
            echo "Project assignment updated successfully.";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function assign_user_as_scrummuster($role, $id)
    {

        try {
            $stm = $this->connectToDatabase()->prepare("UPDATE Users SET roleuser='$role', project_ID=NULL  where Membre_ID= '$id'");
            $stm->execute();

            header("Location: dashboardadmin.php?success=1");
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
class scrummuster extends user
{
    // public function fetch_my_teams(){
    //     try{
    //         $stm=$this->connectToDatabase()->prepare("SELECT * FROM equipes where scrummuster_id=:id ");
    //         $stm->bindParam(:)

    //         $stm->execute([$this]);
    //         return $stm->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {

    //         return $e->getMessage();
    //     }
    // }
    public function fetch_my_teams()
    {
        try {
            $stm = $this->connectToDatabase()->prepare("SELECT * FROM equipes where scrummuster_id = :id");
            $stm->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function delete_team($deleteequipe)
    {
        try {
            $stm = $this->connectToDatabase()->prepare("DELETE FROM equipes WHERE équipe_ID = '$deleteequipe'");
          
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getTeamInfoAndMembers($equipeID)
    {
        try {
            $pdo = $this->connectToDatabase();

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
