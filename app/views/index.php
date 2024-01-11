

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    <nav class="relative flex w-full flex-wrap items-center justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700  lg:pt-2" data-te-navbar-ref>
        <div class="flex w-full items-center justify-between px-2">
            <div>
                <a class="" href="#">
                    <img class="mr-2 md:ml-10 w-[150px] h-[70px] md:w-[100px] " src="../../public/images/logowiki.png" alt="WIKI Logo" />
                </a>
            </div>



            <div class="   flex  items-center lg:mt-0  md:justify-between" id="navbarSupportedContent4" data-te-collapse-item>
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:mt-1 lg:flex-row">

                </ul>

                <div class="flex items-center md:justify-rounded md:w-[40vw] md:gap-x-32 gap-x-2">

                    <input type="search" placeholder="Search" class="h-[40px] w-[140px] md:w-auto p-4 rounded-xl outline-none border border-gray-500 ">

                    <div class="flex gap-4">
                        <?php
                        if (isset($_SESSION['user'])) {

                        ?>
                            <a href="../Author/dashboardWikis.php"><button title="Delete" name="delete" value="" class="flex gap-x-2 md:font-bold items-center text-[10px] md:text-[14px] h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24">
                                        <path d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z" />
                                    </svg>
                                    My WIKIS

                                </button></a>
                            <a href="../authentification/login.php"><button type="button" class="flex gap-x-2 md:font-bold items-center text-[10px] md:text-[14px] h-10 px-5 text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-gray-700">
                                    Log Out
                                </button></a>
                        <?php  } else { ?>
                            <a href="authentification/login.php"><button type="button" class="mr-3 inline-block rounded px-4 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase  text-primary transition duration-150  hover:bg-neutral-200  focus:outline-none  ">
                                    Login
                                </button></a>
                            <a href="authentification/register.php"><button type="button" class="mr-3 inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase leading-normal text-white  transition duration-150  hover:bg-primary-600  focus:bg-primary-600  focus:outline-none focus:ring-0 active:bg-primary-700 ">
                                    Sign up
                                </button></a>
                        <?php   }
                        ?>
                    </div>


                </div>
            </div>
        </div>
    </nav>
    <div class="bg-gradient-to-r from-blue-500 via-blue-300 to-blue-500 text-[#333] p-8 w-full rounded font-[sans-serif]">
        <div class="max-w-2xl mx-auto text-center">
            <h1 class="sm:text-5xl text-3xl font-extrabold">Try using our templates</h1>
            <div class="my-10">
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et
                    tempus blandit, metus mi consectetur nibh, a pharetra felis turpis vitae ligula. Etiam laoreet velit nec neque
                    ultrices, non consequat mauris tincidunt.</p>
            </div>
            <hr class="border-[#333]" />
            <div class="mt-10 flex max-sm:flex-col justify-center sm:gap-6 gap-4">
                <button type="button" class="px-6 py-3 rounded text-white text-sm tracking-wider font-semibold border border-[#333] outline-none bg-[#333] hover:bg-transparent hover:text-[#333] transition-all duration-300">Get started</button>
                <button type="button" class="px-6 py-3 rounded text-sm tracking-wider font-semibold border border-[#333] outline-none bg-transparent hover:bg-[#333] hover:text-white transition-all duration-300">Learn more</button>
            </div>
        </div>
    </div>
    <div class="bg-white font-[sans-serif] p-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-xl mx-auto">
                <h2 class="text-3xl font-extrabold text-[#333] inline-block">LATEST BLOGS</h2>
                <p class="text-gray-600 text-sm mt-6  ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 max-md:max-w-lg mx-auto">
                <div class="bg-white cursor-pointer rounded overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-50">
                    <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
                    <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
                        <span class="text-sm block mb-2 text-yellow-400 font-semibold">10 FEB 2023 | BY JOHN DOE</span>
                        <h3 class="text-xl font-bold text-white">A Guide to Igniting Your Imagination</h3>
                        <div class="mt-4">
                            <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white cursor-pointer rounded overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-50">
                    <img src="https://readymadeui.com/hacks-watch.webp" alt="Blog Post 2" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
                    <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
                        <span class="text-sm block mb-2 text-yellow-400 font-semibold">7 JUN 2023 | BY MARK ADAIR</span>
                        <h3 class="text-xl font-bold text-white">Hacks to Supercharge Your Day</h3>
                        <div class="mt-4">
                            <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
                        </div>
                    </div>
                </div>
                <form action="../controllers/ConWikis.php" method="post">
                <button name="catId" value="<?=$id ?>">
                    <div class="bg-white cursor-pointer rounded overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-50">
                        <img src="https://readymadeui.com/prediction.webp" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
                        <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
                            <span class="text-sm block mb-2 text-yellow-400 font-semibold">5 OCT 2023 | BY SIMON KONECKI</span>
                            <h3 class="text-xl font-bold text-white">Trends and Predictions</h3>
                            <div class="mt-4">
                                <p class="text-gray-200 text-sm ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
                            </div>
                        </div>
                    </div>
                </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>