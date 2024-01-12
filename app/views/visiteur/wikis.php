<?php
require_once(__DIR__ . "/../../controllers/ConWikis.php");
require_once(__DIR__ . "/../../controllers/ConCategorie.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    <nav class="relative flex w-full flex-wrap items-center justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 mb-[5vh] lg:pt-2" data-te-navbar-ref>
        <div class="flex w-full items-center justify-between px-2">
            <div>
                <a class="" href="../index.php">
                    <img class="mr-2 md:ml-10 w-[150px] h-[70px] md:w-[100px] " src="../../../public/images/logowiki.png" alt="WIKI Logo" />
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
                            <a href="../Author/dashboardWikis.php"><button  value="" class="flex gap-x-2 md:font-bold items-center text-[10px] md:text-[14px] h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24">
                                        <path d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z" />
                                    </svg>
                                    My WIKIS

                                </button></a>
                            <a href="../authentification/login.php"><button type="button" class="flex gap-x-2 md:font-bold items-center text-[10px] md:text-[14px] h-10 px-5 text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-gray-700">
                                    Log Out
                                </button></a>
                        <?php  } else { ?>
                            <a href="../authentification/login.php"><button type="button" class="mr-3 inline-block rounded px-4 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase  text-primary transition duration-150  hover:bg-neutral-200  focus:outline-none  ">
                                    Login
                                </button></a>
                            <a href="../authentification/register.php"><button type="button" class="mr-3 inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase leading-normal text-white  transition duration-150  hover:bg-primary-600  focus:bg-primary-600  focus:outline-none focus:ring-0 active:bg-primary-700 ">
                                    Sign up
                                </button></a>
                        <?php   }
                        ?>
                    </div>


                </div>
            </div>
        </div>
    </nav>
    <div>
        <?php
        if (isset($_SESSION['user'])) {

        ?>
            <div class="w-[91%] mx-auto flex justify-between h-16 items-center">
                <form action="../../controllers/ConWikis.php" method="post"><button name="Unset"  class="px-2 py-2.5 min-w-[140px] lg:w-[290px] shadow-lg rounded-full text-black text-sm  font-medium border-none outline-none bg-sky-200 active:shadow-inner">All Wikis</button></form>

                <a href="../Author/AddWiki.php"><button class="flex gap-x-2 font-bold items-center h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">

                        <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24">
                            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                        </svg>
                        <span>Create your own WIKI</span>
                    </button></a>

            </div>
        <?php  } else { ?>
            <div class="w-[90%] mx-auto flex justify-between h-16 items-center">
                <form action="../../controllers/ConWikis.php" method="post"><button name="Unset" class="px-2 py-2.5 min-w-[140px] shadow-lg rounded-full text-black text-sm  font-medium border-none outline-none bg-sky-200 active:shadow-inner">All Wikis</button></form>

                <a href="../authentification/login.php"><button class="flex gap-x-2 font-bold items-center h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24">
                            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                        </svg>
                        <span>Create your own WIKI</span>
                    </button>
                </a>

            </div>
        <?php   }
        ?>
    </div>

    <section class="flex min-h-screen ">
        <!-------------------------------------------------------------Categorys------------------------------------------------- -->
        <div class="w-[19%] ml-auto">
            <div class="md:min-h-fit min-h-[50px] w-[100%]   rounded-xl bg-slate-100 flex flex-col gap-y-4 items-center py-4">
                <div class="w-full text-center text-sm md:text-xl font-semibold md:font-bold">
                    <h1>Categorys</h1>
                </div>


                <?php
                foreach ($Categorys as $Category) :
                ?>
                    <div>
                        <form action="../../controllers/ConWikis.php" method="post">
                            <input type="hidden" name="catId" value="<?= $Category->getId() ?>">
                            <div class="flex flex-col w-[93%] rounded-t	 mx-auto items-center shadow-md rounded-[40px]">
                                <a href="#">
                                    <img class="w-full rounded-t" src="<?= $Category->getCategory_image(); ?>" alt="Sunset in the mountains">


                                </a>

                                <button type="submit" class="text-center rounded-b w-full bg-blue-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ">
                                    <?= $Category->getCategory_name(); ?>
                                </button>



                            </div>
                        </form>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
        <!--------------------------------------------------------------WIKIS------------------------------------------------- -->

        <div class="min-h-full w-[70%] mx-auto rounded-xl">

            <?php

            $wik = (!empty($wikisCat)) ? $wikisCat : $wikis;

            
                foreach ($wik as $wiki) : ?>
                    <div>
                        <form action="../../controllers/ConWikis.php" method="post">
                            <button type="submit" name="wikiId" value="<?= $wiki->getId(); ?>" class="md:flex cursor-pointer w-full md:min-h-[25vh] min-h-fit bg-slate-100 rounded-xl p-8 md:p-0  hover:scale-105 mb-6 md:mb-4">
                                <img class="w-64 md:min-h-[25vh] h-[5%]  md:h-auto md:rounded-xl rounded-xl mx-auto lg:mx-0" src="<?= $wiki->getWikiImage(); ?>" alt="" width="384" height="512">
                                <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                                    <div class="text-slate-700 text-2xl font-bold">
                                        <h1><?= $wiki->getWikiTitle(); ?></h1>
                                    </div>
                                    <div>
                                        <p class="text-lg font-medium">
                                            <?= $wiki->getWikiSummarize(); ?>
                                        </p>
                                    </div>
                                    <div class="font-medium text-sky-500">

                                        <p><?= $_SESSION['username'] ?></p>
                                        <div class="w-full text-right font-medium text-gray-500 mt-2"> <?= $wiki->getDate(); ?></div>

                                    </div>
                                    <div class="flex flex-wrap">
                                        <?php foreach ($tags as $tag) : ?>
                                            <p class="m-1 w-[7%] mb-4  flex justify-center text-[10px] sm:text-sm bg-gray-200 hover:bg-gray-300  rounded-[40px] px-4 py-2 font-bold leading-loose   "><?= $tag->getTagname(); ?> </p>

                                        <?php endforeach; ?>

                                    </div>

                                </div>
                            </button>
                        </form>
                    </div>
            <?php endforeach;
            ?>



        </div>
    </section>
</body>

</html>