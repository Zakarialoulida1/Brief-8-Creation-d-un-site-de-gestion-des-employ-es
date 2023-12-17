
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

    <div class=" lg:flex-row lg:justify-evenly lg:items-center flex flex-col items-center mt-4 ">

        <img class="lg:w-2/5 w-4/5 " src="./img/Designimg.png" alt="">

        <div class="border-2 border-black  flex flex-col items-center p-2">

            <h1 class="font-semibold underline" id="heading">Sign Up Form</h1><br>
            <form class="  flex flex-col items-center" enctype="multipart/form-data" action="sign_process.php"  method="POST">




                <h2 class="space-y-12 border-b border-gray-900/10 pb-12 text-base font-semibold leading-7 text-gray-900">Profile</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful
                    what you share.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="col-span-full">
                        <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Product Photo</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <input type="file" id="product_picture" name="product_picture" class="sr-only">
                                    </label>
                                </div>
                                <input type="file" name="product_picture">
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex gap-2 items-center">
                    <i class="fa fa-user fa-lg"></i>
                    <input class="border-2 border-black rounded w-[250px] p-1" type="text" id="user" name="Username" placeholder="Enter Username" required></br></br>
                </div>
                <div class="flex gap-2 items-center"><i class="fa fa-user fa-lg"></i>
                    <input class="border-2 border-black rounded w-[250px] p-1" type="text" id="user" name="userlastname" placeholder="Enter Userlastname" required></br></br>
                </div>
                <div class="flex gap-2 items-center">
                    <i class="fa-solid fa-phone"></i>
                    <input class="border-2 border-black rounded  w-[250px] p-1" type="text" id="user" name="phonenumber" placeholder="Enter Yourphonenumber" required></br></br>
                </div>
                <div class="flex gap-2 items-center"><i class="fa-solid fa-envelope fa-lg"></i>
                    <input class="border-2 border-black rounded w-[250px] p-1" type="email" id="email" name="email" placeholder="Enter Email" required></br></br>
                </div>
                <div class="flex gap-2 items-center"><i class="fa-solid fa-lock fa-lg"></i>
                    <input class="border-2 border-black rounded w-[250px] p-1" type="password" id="pass" name="pass" placeholder="Create Password" required></br></br>
                </div>
                <div class="flex gap-2 items-center"><i class="fa-solid fa-lock fa-lg"></i>
                    <input class="border-2 border-black rounded w-[250px] p-1" type="password" id="cpass" name="cpass" placeholder="Retype Password" required></br></br>
                </div>
                <a href="index.php"><input class=" bg-teal-100 border-2 border-black rounded w-[285px] p-1" type="submit" id="btn" value="SignUp" name="submit" /></a>
                   </form>
        </div>

</body>

</html>