<?php
session_start();


if (isset($_SESSION['Membre_ID']) && isset($_SESSION['nom'])) {

  $role=$_SESSION['roleuser'];

  if ($role !== 'user') {
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
    include 'dbconnect.php';
    
    // Fetch the rows from the 'product' table
    $id = $_SESSION['Membre_ID'];
    $affichuser = "SELECT * FROM users WHERE Membre_ID= '$id' ";
    $result = mysqli_query($sql, $affichuser);

   
    $row = mysqli_fetch_assoc($result);

    $nom = $row['nom'];
    $prenom = $row['prénom'];
    $roleuser = $row['roleuser'];
    $monequipe = $row['équipe_ID'];
      $nomdelequipe=""; 
         $image = $row['image'];
    if($monequipe!=NULL){

    $affich_monequipe = "SELECT * FROM equipes WHERE équipe_ID= '$monequipe' ";
    $result= 0;
  
    if(mysqli_query($sql, $affich_monequipe)==NULL){
      $result2 =  mysqli_query($sql, $affich_monequipe);
       $ligne = mysqli_fetch_assoc($result2);
       $nomdelequipe= $ligne['Nom_Équipe'];
    }}
   
   
    ?>

    <div class="min-h-[640px] bg-gray-100" x-data="{ open: false }" @keydown.window.escape="open = false">





      <div id="sidebar" class=" hidden fixed w-full lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0  z-50 ">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex-1 flex flex-col min-h-0 bg-[#9ad0d3]">
          <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex  justify-between items-center  px-4">
              <button id="fermernav"><i class=" lg:hidden text-black fas fa-times fa-2xl"></i></button>
              <img class="lg:hidden h-12 inline-block m-2 " src="./img/logo (1).png" alt="Workflow">
            </div>
            <nav class="mt-5 flex-1 px-2 space-y-1">

              <a href="dashboarduser.php" class=" hover:bg-[#BFD8D5] bg-[#9ad0d3] text-black group flex items-center px-2 py-2 text-sm font-medium rounded-md" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-indigo-800 text-black&quot;, Default: &quot;text-black hover:bg-[#BFD8D5] hover:bg-opacity-75&quot;">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-[black]" x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dashboard
              </a>

              <button id="team" class="team text-black hover:bg-[#BFD8D5] hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-indigo-800 text-black&quot;, undefined: &quot;text-black hover:bg-[#BFD8D5] hover:bg-opacity-75&quot;">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-black" x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Collaborators
              </button>

              <button id="affichproject" class=" text-black hover:bg-[#BFD8D5] hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md" x-state-description="undefined: &quot;bg-indigo-800 text-black&quot;, undefined: &quot;text-black hover:bg-[#BFD8D5] hover:bg-opacity-75&quot;">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-black" x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                Projects
              </button>


            </nav>
          </div>
          <div class="w-full flex justify-between items-center border-t border-black p-4">


            <div class="ml-3 flex flex-col">

            <img class='inline-block h-14 w-14 rounded-full  ' src='img/<?php echo $image?>' alt=''>


              <p class="text-sm font-medium text-black">
                <?php echo"  $prenom  " ;
                echo $nom?>
              </p>
             
            </div>

            <a href="logout.php" class="p-4 w-fit h-fit text-center text-black text-xs font-medium bg-red-400 rounded-full">LOG OUT</a>


          </div>
        </div>
      </div>
      <div class="burgermenu lg:pl-64 flex flex-col flex-1">
        <div class="sticky top-0 z-10 lg:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-gray-100">
          <button type="button" class=" -ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="open = true">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>





        <main class="flex-1 ">

          <div class="py-6 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
              <h1>Hello, <?php echo $_SESSION['nom']; ?></h1>
              <h2 class="text-2xl font-semibold text-gray-900">YOUR team</h2>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
              <div class="bg-gray-100 py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                  <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3  2lg:grid-cols-4">






                  <?php

                    echo "
                        <li class='col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200'>
                        <div class='flex-1 flex flex-col p-8'>
          <img class='w-32 h-32 flex-shrink-0 mx-auto rounded-full' src='img/$image' alt=''>
          <h3 class='mt-6 text-gray-900 text-sm font-medium'>$nom $prenom</h3>
          <dl class='mt-1 flex-grow '>
           
            <h4>your team is :</h4>
            <dd class='mt-3'>
              <span class='px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full'>$nomdelequipe</span>
            </dd>
          </dl>
        </div>
        
      
          </li>";

              
          $idprojectrecuperer=0;
                            $tirerequipe = "SELECT project_ID  FROM equipes WHERE équipe_ID= '$monequipe' ";
                           if(  mysqli_query($sql, $tirerequipe)==NULL){
                            $equipe = mysqli_query($sql, $tirerequipe);
                            $equipeselect=mysqli_fetch_assoc($equipe);
                            $idprojectrecuperer=$equipeselect['project_ID'];

}
        else { echo"YOU DON'T have a project";}

                            $affichprojects="SELECT * from projects where project_ID= '$idprojectrecuperer' ";
                            $execut = mysqli_query($sql, $affichprojects);
                            if($row = mysqli_fetch_assoc($execut)){ 

                                $projectID = $row['project_ID'];
                                $projectName = $row['Nom_project'];
                                $description = $row['descrip'];
                                $startDate = $row['Date_de_debut'];
                                $endDate = $row['date_fin'];

                        ?>





                                <li class=" hidden project col-span-1 flex flex-col text-center bg-white rounded-lg shadow  divide-gray-200">
                                <h2>Your Project is :</h2>
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
                                    <div class="-mt-px flex divide-x divide-gray-200">








                                </li>
                             
</ul>

                </div>
              </div>


        </main>
    <?php    

  $equipeID = $monequipe;
  
    
  
 
    $membresQuery = "SELECT * FROM users WHERE équipe_ID = '$equipeID'";
    $membresResult = mysqli_query($sql, $membresQuery);
  
  $equipeInfoQuery = "SELECT * FROM equipes WHERE équipe_ID = '$equipeID'";
  $equipeInfoResult = mysqli_query($sql, $equipeInfoQuery);
  $equipeInfo = mysqli_fetch_assoc($equipeInfoResult);

  if ($equipeInfo && mysqli_num_rows($membresResult) > 0) {
    $nomEquipe = $equipeInfo['Nom_Équipe'];
    
    echo "<div class='table hidden p-12 '>";
    echo "<h2 class='text-2xl font-semibold text-center bg-green-200 text-gray-900 mt-8 mb-4'>$nomEquipe</h2>";
    echo "<table class='min-w-full divide-y divide-gray-200'>";
    echo "<thead class='bg-gray-50'>";
    echo "<tr>";
    echo "<th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Nom</th>";
    echo "<th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'>Prénom</th>";
    
    echo "</tr>";
    echo "</thead>";
    echo "<tbody class='bg-white divide-y divide-gray-200'>";

    
    while ($membre = mysqli_fetch_assoc($membresResult)) {
      $membreID = $membre['Membre_ID'];
      $nomMembre = $membre['nom'];
      $prenomMembre = $membre['prénom'];
      $image=$membre['image'];

      echo "<tr>";
      echo "<td class='px-6 py-4 whitespace-nowrap'>$nomMembre</td>";
      echo "<td class='px-6 py-4 whitespace-nowrap'>$prenomMembre</td>";
      
      echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
  } else {
    echo "<p>Aucun membre dans cette équipe.</p>";
  }
}
?>
   <?php
                            
                                ?>
      </div>
    </div>
    <script src="script.js"></script>
    <script>
      const team=document.getElementById('team');
      const table=document.querySelector('.table')
      team.addEventListener('click',()=>{
        table.classList.toggle('hidden');

      })
      const affichproject=document.getElementById('affichproject');
      const project =document.querySelector('.project');
      affichproject.addEventListener('click',()=>{
        project.classList.toggle('hidden');

      })
      



    </script>

  </body>






<?php
}else {
  header("Location: index.php");
  exit();
}
?>