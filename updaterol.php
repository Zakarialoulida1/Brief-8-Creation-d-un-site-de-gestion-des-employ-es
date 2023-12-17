<?php
include 'dbconnect.php';
require_once("signupconfig.php");
$Productowner=new productowner();
$id = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];  
}
if (isset($_POST['submit'])) {
    $role = $_POST["rol"];
   $Productowner->assign_user_as_scrummuster($role,$id);
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="... votre intégrité ..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>

    <?php
   
    ?>

    <div class="min-h-[640px] bg-gray-100" x-data="{ open: false }" @keydown.window.escape="open = false">





       
        <div class=" lg:pl-64 flex flex-col flex-1">
            <div class="sticky top-0 z-10 lg:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-gray-100">
                <button type="button" class="burgermenu -ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">

                    <svg class="h-6 w-6" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>





            <main class="flex-1 ">



                <div id="popup" class=" fixed inset-0 bg-gray-500 bg-opacity-75 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="bg-white p-8 rounded shadow-md">
                            <h2 class="text-lg font-semibold mb-4">Modifier le rôle de l'utilisateur</h2>
                            <form method="post" action="">
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="countries" name="rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose a rol</option>
                                    <option value="scrummuster">Scrum Master</option>
                                    <option value="user">user</option>

                                </select>
                                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-4 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update rol</button>
                            </form>
                        </div>
                    </div>
                </div>
                
               
                


               

            </main>
        </div>
    </div>


    <script src="script.js"></script>


</body>


</html>