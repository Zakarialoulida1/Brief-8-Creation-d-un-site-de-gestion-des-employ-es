<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="flex bg-[#9ad0d0] justify-between items-center px-4">
        <img class="lg:h-[7vh] h-12 inline-block m-2" src="./img/logo (1).png" alt="Workflow">
        <div>
            <a href="index.php" class="p-[8px] w-fit h-fit text-center text-black text-xs font-medium bg-white rounded-full">Login</a>
            <a href="signupform.php" class="p-[8px] w-fit h-fit text-center text-white text-xs font-medium bg-black rounded-full hover:bg-white hover:text-black">SignUp</a>
        </div>
    </div>

    <div class=" lg:flex-row lg:justify-evenly lg:items-center lg:h-[90vh] flex flex-col items-center ">

        <img class="lg:w-2/5 w-4/5 " src="./img/Designimg.png" alt="">


        <section class="mb-8  ">
            <h1 class="text-[40px] p-12"> WELCOME </h1>
            <div class="border-2 border-black  flex flex-col items-center p-2 m-auto">

                <h1 class="font-semibold underline" id="heading">LOGIN IN YOUR ACCOUNT</h1><br>
                <form class="  flex flex-col items-center" action="sign_process.php" method="post">
                    <!-- name="form" action="signup.php" method="POST" -->
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="flex gap-2 items-center"><i class="fa-solid fa-envelope fa-lg"></i>
                        <input class="border-2 border-black rounded w-[250px] p-1" type="email" id="email" name="email" placeholder="Enter Email" required></br></br>
                    </div>
                    <div class="flex gap-2 items-center"><i class="fa-solid fa-lock fa-lg"></i>
                        <input class="border-2 border-black rounded w-[250px] p-1" type="password" id="pass" name="pass" placeholder="Create Password" required></br></br>
                    </div>
                    <!-- <input class=" bg-teal-100 border-2 border-black rounded w-[285px] p-1" type="submit" id="btn" value="Login" name="submit" /> -->
                    <button type="submit" name="login" class=" text-center bg-teal-100 border-2 border-black rounded w-[285px] p-1">
                        LOGIN</button>
                </form>
                <h4>D'ont have an Account? <a class="text-red-600 underline" href="signup.php"> Sign Up</a></h4>
            </div>
        </section>
</body>

</html>