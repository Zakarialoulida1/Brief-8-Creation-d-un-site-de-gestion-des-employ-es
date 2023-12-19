<?php

require_once("signupconfig.php");
if ( isset($_POST['login'])) {
    
    // $userauthenticator = new UserAuthentication();
    $userauthenticator = new user($pdo);
     
    $result = $userauthenticator->authenticateUser($_POST['email'], $_POST['pass']);

    if (strpos($result, "Error") !== false) {
       
        exit();
    }

} else if (isset($_POST['submit'])) {
 
     $hashedPassword = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $user = new user($pdo);
    $user->register_user($_POST['Username'],$_POST['userlastname'],$_POST['email'],$hashedPassword,"user",$_FILES['product_picture']['name'],$_POST['phonenumber']);
    // var_dump($user);
    // die();
    // $user->setusername($_POST['Username']);
    // $user->setuserlastname($_POST['userlastname']);
    // $user->setphonenumber($_POST['phonenumber']);
    // $user->setrole("user");
    // $user->setemail($_POST['email']);
    

    // $user->setpassword($hashedPassword);
    // move_uploaded_file($_FILES['product_picture']['tmp_name'], "./img/$product_picture_name");

    // $user->setimg($_FILES['product_picture']['name']);
    // echo"<pre>";
    // var_dump($user->getusername($_POST['Username']));
    // echo"<pre>";
    
    //echo"<pre>";
    $user->insertdata();
    // echo"<pre>";
    echo " <script>alert('data saved successfully');document.location='dashboarduser.php'</script>";
      


 header("Location:index.php");
    exit();
    
}


