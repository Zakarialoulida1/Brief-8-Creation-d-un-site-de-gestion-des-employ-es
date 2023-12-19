<?php
session_start();

if (isset($_SESSION['Membre_ID']) && isset($_SESSION['nom'])) {

    require_once("CLASS_PO.php");
    require_once("CLASS_PROJECT.PHP");
    $role = $_SESSION['roleuser'];
    $Project=new project($pdo);
    $Productowner = new productowner($pdo);
    $Productowner->loginuser($_SESSION['Membre_ID'], $_SESSION['prénom'], $_SESSION['nom'], $_SESSION['email'], $_SESSION['motdepasse'], $_SESSION['roleuser'], $_SESSION['image'], $_SESSION['téléphone']);

    // $user=new user();
    //    var_dump($user);
    //    die();
    if ($role !== 'PO') {

        // Redirect to an unauthorized access page or show an error message
        header("Location: unauthorized.php");
        exit();
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
        // include 'dbconnect.php';
        // $id = $_SESSION['Membre_ID'];
        // $affichuser = "SELECT * FROM users WHERE Membre_ID= '$id' ";
        // $result = mysqli_query($sql, $affichuser);

        // $row = mysqli_fetch_assoc($result);

        // $nom = $row['nom'];
        // $prenom = $row['prénom'];
        // $roleuser = $row['roleuser'];
        // $monequipe = $row['équipe_ID'];
        // $image = $row['image'];
        // $project_ID = $row['project_ID'];
        ?>







        <div id="sidebar" class="min-h-[640px] bg-gray-100 hidden fixed w-full lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0  z-50 ">

            <div class="flex-1 flex flex-col min-h-0 bg-[#9ad0d3]">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div class="flex  justify-between items-center  px-4">
                        <button id="fermernav"><i class=" lg:hidden text-black fas fa-times fa-2xl"></i></button>
                        <img class="lg:hidden h-12 inline-block m-2 " src="./img/logo (1).png" alt="Workflow">
                    </div>
                    <nav class="mt-5 flex-1 px-2 space-y-1">

                        <button id="all" class=" hover:bg-[#BFD8D5] bg-[#9ad0d3] text-black group flex items-center px-2 py-2 text-sm font-medium rounded-md" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-indigo-800 text-black&quot;, Default: &quot;text-black hover:bg-[#BFD8D5] hover:bg-opacity-75&quot;">
                            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-[black]" x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Dashboard
                        </button>


                        <button id="btnproject" class="text-black hover:bg-[#BFD8D5] hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-indigo-800 text-black&quot;, undefined: &quot;text-black hover:bg-[#BFD8D5] hover:bg-opacity-75&quot;">
                            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-black" x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                            </svg>
                            My Projects
                        </button>


                    </nav>
                </div>
                <div class="w-full flex justify-between items-center border-t border-black p-4">


                    <div class="ml-3 flex flex-col">

                        <img class='inline-block h-14 w-14 rounded-full  ' src='img/<?php echo $Productowner->getimg() ?>' alt=''>


                        <p class="text-sm font-medium text-black">
                            <?php echo   $Productowner->getusername();
                            echo $Productowner->getuserlastname() ?>
                        </p>

                    </div>

                    <a href="logout.php" class="p-4 w-fit h-fit text-center text-black text-xs font-medium bg-red-400 rounded-full">LOG OUT</a>


                </div>
            </div>
        </div>
        <div class=" lg:pl-64 flex flex-col flex-1">
            <div class="sticky top-0 z-10 lg:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-gray-100">
                <button type="button" class="burgermenu -ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>







            <main class="flex-1 ">


                <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 md:px-8 flex justify-between items-center ">
                    <div>
                        <h1>Hello, <?php echo $_SESSION['nom']; ?></h1>

                    </div>

                    <a href="createproject.php" <?php if ($_SESSION['roleuser'] != 'PO') { ?>style="display:none" <?php }  ?> class="p-4 w-fit h-fit text-center text-black text-xs font-medium bg-green-400 rounded-full"><button>Create a Project</button></a>
                    <a href="createequipe.php" <?php if ($_SESSION['roleuser'] != 'scrummuster') { ?>style="display:none" <?php }  ?> class="p-4 w-fit h-fit text-center text-black text-xs font-medium bg-green-400 rounded-full"><button>Create a Team</button></a>



                </div>


                <div class="myproject bg-gray-100 py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class=" text-center">YOUR PROJECTS </h1>

                    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3  2lg:grid-cols-4">
                        <?php


                        $result = $Project->fetchallproject();
                        foreach ($result as $row) {
                            # code...


                            $projectID = $row['project_ID'];
                            $projectName = $row['Nom_project'];
                            $description = $row['descrip'];
                            $startDate = $row['Date_de_debut'];
                            $endDate = $row['date_fin'];

                        ?>





                            <li class=" col-span-1 flex flex-col text-center bg-white rounded-lg shadow  divide-gray-200">
                                <div class="flex-1 flex flex-col justify-between p-8 ">

                                    <h3 class=" text-gray-900 text-sm font-medium"><?php echo "  $projectName" ?></h3>


                                    <div class="  text-gray-500  text-sm">
                                        <?php
                                        echo "<p class='mb-3 font-normal text-gray-700'>$description</p>";

                                        ?>
                                    </div>


                                    <div class="  flex justify-between">
                                        <span class="px-2 py-1 text-g*reen-800 text-xs font-medium bg-green-100 rounded-full"><?php echo "   $startDate" ?></span>
                                        <span class="px-2 py-1 text-green-800 text-xs font-medium bg-red-400 rounded-full"><?php echo "  $endDate" ?></span>
                                    </div>


                                </div>
                                <div class="-mt-px flex divide-x divide-gray-200  ">





                                    <form class=" w-0 flex-1 flex" method="post">

                                        <input type="hidden" name="deleteId" value="<?php echo "$projectID"; ?>">
                                        <button type="submit" id="delete it" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500 ml-3">Delete it</button>


                                    </form>
                                    <form class="-ml-px w-0 flex-1 flex" action="" method="GET">
                                        <input type="hidden" name="updateProjectID" id="updateProjectID" value="<?php echo "$projectID"; ?>">
                                        <a href="editproject.php?id=<?php echo $projectID; ?>" class="btn_update_project relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500 ml-3"> UPDATE
                                        </a>
                                    </form>
                                </div>


                            </li>

                        <?php


                            if (isset($_POST['deleteId'])) {
                                $deleteId = $_POST["deleteId"];    
                                $Productowner->deleteproject($deleteId);
                            }
                        };

                        ?>

                    </ul>


                    <hr class=" h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">
                    <ul role="list" class="users grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3  2lg:grid-cols-4">




                        <?php


                        $result = $Productowner->fetchAll();
                        foreach ($result as $row) {
                            $nom = $row['nom'];
                            $prenom = $row['prénom'];
                            $roleuser = $row['roleuser'];
                            $userid = $row['Membre_ID'];
                            $image = $row['image'];

                        ?>

                            <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                                <div class="flex-1 flex flex-col p-8">
                                    <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" src="img/<?php echo "$image" ?>" alt="">
                                    <h3 class="mt-6 text-gray-900 text-sm font-medium"><?php echo "$nom ";
                                                                                        echo "$prenom" ?></h3>
                                    <dl class="mt-1 flex-grow flex flex-col justify-between">


                                        <dd class="mt-3">
                                            <span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full"><?php echo "$roleuser" ?></span>
                                        </dd>
                                    </dl>
                                </div>

                                <div class="-mt-px flex divide-x divide-gray-200">
                                    <div class="w-0 flex-1 flex">
                                        <a href="updaterol.php?id=<?php echo $row["Membre_ID"]; ?>" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">

                                            <button class="Assignhimasproductowner assign-product-owner ml-3">Update ROLE</button>
                                        </a>
                                    </div>


                                    <div class=" -ml-px w-0 flex-1 flex" <?php if ($roleuser === 'user') { ?>style="display:none" <?php } ?>>


                                        <button data-id="<?php echo $userid; ?>" class="Assigntohimaproject ml-3">Assign him a project</button>


                                    </div>

                                </div>

                            </li>

                        <?php
                        }
                        ?>
                    </ul>





                    <div id="popup" class="popup hidden fixed inset-0 bg-gray-500 bg-opacity-75 overflow-y-auto">
                        <div id="popup" class="flex items-center justify-center min-h-screen">
                            <div class="bg-white p-8 rounded shadow-md">
                                <h2 class="text-lg font-semibold mb-4">Modifier le rôle de l'utilisateur</h2>
                                <form method="post" action="">

                                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                    <select id="countries" name="rol" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Choose a projects</option>
                                        <?php
                                        $result = $Project->fetchallproject();
                                        foreach ($result as $row) {
                                            $projectID = $row['project_ID'];
                                            $projectName = $row['Nom_project'];

                                        ?>

                                            <option value="<?php echo " $projectID" ?>"><?php echo "$projectName" ?></option>

                                        <?php } ?>
                                    </select>

                                    <input type="hidden" name="userId" id="selectedUserId" value="">
                                    <button type="submit" name="submitproject" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-4 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">assign it to him</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php

                    if (isset($_POST['submitproject'])) {
                        $Productowner->update_scrum_muster_project($_POST['rol'], $_POST['userId']);
                    }

                    ?>


            </main>

        </div>
        <script src="script.js"></script>
        <script src="dynamic.js"></script>
        
    </body>


    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>