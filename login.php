<?php 
session_start(); 
include "dbconnect.php";

if (isset($_POST['email']) && isset($_POST['pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['pass']);

	if (empty($email)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$req = "SELECT * FROM users WHERE email='$email' AND motdepasse='$pass'";

		$result = mysqli_query($sql, $req);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['motdepasse'] === $pass) {
            	$_SESSION['nom'] = $row['nom'];
            	$_SESSION['prénom'] = $row['prénom'];
            	$_SESSION['Membre_ID'] = $row['Membre_ID'];
				$_SESSION['roleuser'] =$row['roleuser'];
				$_SESSION['équipe_ID'] =$row['équipe_ID'];
				$_SESSION['project_ID'] =$row['project_ID'];
				if($_SESSION['roleuser']==='PO') {
            	header("Location: dashboardadmin.php");
		        exit();}
				elseif($_SESSION['roleuser']==='scrummuster')
				{
					header("Location: dashboardscrummuster.php");
		        exit();}
				else{
					header("Location: dashboarduser.php");
					exit();}
				}
            else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
