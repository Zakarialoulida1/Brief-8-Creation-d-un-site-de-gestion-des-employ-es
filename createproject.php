<?php
include 'dbconnect.php';

if (isset($_POST['submit'])) {
    $projectName = $_POST['projectName'];
    $description = $_POST['description'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    // SQL query to insert data into the "Projects" table
    $project = "INSERT INTO Projects (Nom_project, descrip, Date_de_debut, date_fin) 
        VALUES ('$projectName', '$description', '$startDate', '$endDate')";
 $stmt = mysqli_prepare($sql, $project);
    
 if ($stmt) {
     mysqli_stmt_execute($stmt);
     header("Location: dashboardadmin.php?success=1");
     exit();
 } else {
     echo "Error: " . mysqli_error($sql);
 }


 mysqli_close($sql);

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
    include 'dbconnect.php';
    ?>







    <div id="sidebar" class=" hidden fixed w-full lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0  z-50 ">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex-1 flex flex-col min-h-0 bg-[#9ad0d3]">
            <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                <div class="flex  justify-between items-center  px-4">
                    <button id="fermernav"><i class=" lg:hidden text-black fas fa-times fa-2xl"></i></button>
                    <img class="lg:hidden h-12 inline-block m-2 " src="./img/logo (1).png" alt="Workflow">
                </div>
                <nav class="mt-5 flex-1 px-2 space-y-1">

                    <a href="#" class=" hover:bg-[#BFD8D5] bg-[#9ad0d3] text-black group flex items-center px-2 py-2 text-sm font-medium rounded-md" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-indigo-800 text-black&quot;, Default: &quot;text-black hover:bg-[#BFD8D5] hover:bg-opacity-75&quot;">
                        <svg class="mr-3 flex-shrink-0 h-6 w-6 text-[black]" x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </a>

                    <a href="#" class="text-black hover:bg-[#BFD8D5] hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-indigo-800 text-black&quot;, undefined: &quot;text-black hover:bg-[#BFD8D5] hover:bg-opacity-75&quot;">
                        <svg class="mr-3 flex-shrink-0 h-6 w-6 text-black" x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        Team
                    </a>

                    <a href="#" class="text-black hover:bg-[#BFD8D5] hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-indigo-800 text-black&quot;, undefined: &quot;text-black hover:bg-[#BFD8D5] hover:bg-opacity-75&quot;">
                        <svg class="mr-3 flex-shrink-0 h-6 w-6 text-black" x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                        Projects
                    </a>


                </nav>
            </div>
            <div class="w-full flex justify-between items-center border-t border-black p-4">


                <div class="ml-3 flex flex-col">

                    <img class="inline-block h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">



                    <p class="text-sm font-medium text-black">
                        Tom Cook
                    </p>
                    <p class="text-xs font-medium text-black-400 group-hover:text-black">
                        View profile
                    </p>
                </div>

                <a href="logout.php" class="p-4 w-fit h-fit text-center text-black text-xs font-medium bg-red-400 rounded-full">LOG OUT</a>


            </div>
        </div>
    </div>
    <div class=" lg:pl-64 flex flex-col flex-1">
        <div class="sticky top-0 z-10 lg:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-gray-100">
            <button type="button" class="burgermenu -ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">

                <svg class="h-6 w-6" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>





    <main class="flex-1 ">

        <div class="py-6 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">


            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                <div class="bg-gray-100 py-8">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">





                        <div id="popup" class=" fixed inset-0 bg-gray-500 bg-opacity-75 overflow-y-auto">
                            <div class="flex items-center justify-center min-h-screen">
                                <div class="bg-white p-8 rounded shadow-md">
                                    <h2 class="text-center font-bold underline ">Add a New Project</h2>
                                    <form action="" method="post" class="flex flex-col">
                                        <div class="flex flex-col">
                                            <label for="projectName">Project Name:</label>
                                            <input class=" border-2 border-black rounded" type="text" id="projectName" name="projectName" maxlength="200">
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="description">Description:</label>
                                            <textarea class=" border-2 border-black rounded" id="description" name="description" rows="4" cols="50" maxlength="3000"></textarea>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="startDate">Start Date:</label>
                                            <input class=" border-2 border-black rounded" type="date" id="startDate" name="startDate">
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="endDate">End Date:</label>
                                            <input class=" border-2 border-black rounded" type="date" id="endDate" name="endDate">
                                        </div>
                                        <input class=" hover:bg-green-400 p-2  mt-2 text-center text-black text-xs font-medium bg-gray-200 rounded-full" name="submit" type="submit" value="Add Project">
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


    </main>
    </div>
    </div>


    <script src="script.js"></script>


</body>


</html>