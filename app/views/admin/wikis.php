<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body class="bg-gray-100">
    <div class="flex flex-col h-screen bg-gray-100">


        <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
            <div class="flex items-center justify-between px-4 w-[95%]">
                <div class="flex items-center gap-2">
                    <img src="../../../public/images/logowiki.png" alt="Logo" class="w-24 h-18 mr-2">
                    <p class="text-transparent bg-clip-text bg-gradient-to-r text-[20px] font-bold to-blue-400 from-blue-900">Administration</p>
                </div>


            </div>

            <!-- --------------------------------burger icon ----------------------------- -->
            <div class="space-x-5">
                <button type="button" id="burger" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <!-- --------------------------------burger icon ----------------------------- -->

        </div>
        <!-- --------------------------------burger menu ----------------------------- -->

        <div id="burgerbar" class="hidden absolute z-50	 top-0 right-0 w-72 md:w-1/6 bg-slate-200 opacity-75 flex flex-col font-bold text-xl gap-6 min-h-screen pl-2">
            <a class="hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 h-12" id="close" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="36" viewBox="0 -960 960 960" width="36">
                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg></a>
            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="index.php">
                <i class="fas fa-home mr-2"></i>Dashboard
            </a>
            

            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="Categories.php">
                <i class="fas fa-file-alt mr-2"></i>Categorys
            </a>

            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="wikis.php">
                <i class="fas fa-store mr-2"></i>Wikis
            </a>
            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="tags.php">
                <i class="fas fa-store mr-2"></i>Tags
            </a>
        </div>
        <!-- --------------------------------burger menu ----------------------------- -->

        <div class="flex-1 flex flex-wrap">

            <div class="p-2 bg-white w-full md:w-60 flex flex-col md:flex hidden" id="sideNav">
                <nav><a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="index.php">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                   

                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="Categories.php">
                        <i class="fas fa-file-alt mr-2"></i>Categorys
                    </a>

                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="wikis.php">
                        <i class="fas fa-store mr-2"></i>Wikis
                    </a>
                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="tags.php">
                        <i class="fas fa-store mr-2"></i>Tags
                    </a>

                </nav>

                <a class="block text-black font-bold py-2.5 px-4 my-2 rounded duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white mt-auto" href="#">
                    <i class="fas fa-sign-out-alt mr-2"></i>Log Out
                </a>


            </div>

            <div class="flex-1 p-4 w-full md:w-1/2">


                <div class="mt-8 bg-white p-4 shadow rounded-lg mx-auto min-h-1/2">

                    <h2 class="text-gray-500 text-lg font-semibold pb-4">Wikis</h2>
                    <div class="my-1"></div>
                    <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white font-[sans-serif]">
                            <thead class="bg-gradient-to-r from-sky-300 to-sky-800 whitespace-nowrap">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Email
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Role
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Joined At
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Archive
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="whitespace-nowrap">
                                <tr class="even:bg-blue-50">
                                    <td class="px-6 py-4 text-sm">
                                        John Doe
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        john@example.com
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        Admin
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        2022-05-15
                                    </td>
                                    <td class="pl-8 py-4">

                                        <button class="mr-4" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="red" viewBox="0 -960 960 960" width="24">
                                                <path d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="even:bg-blue-50">
                                    <td class="px-6 py-4 text-sm">
                                        Jane Smith
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        jane@example.com
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        User
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        2022-07-20
                                    </td>
                                    <td class="pl-8 py-4">

                                        <button class="mr-4" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="red" viewBox="0 -960 960 960" width="24">
                                                <path d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="even:bg-blue-50">
                                    <td class="px-6 py-4 text-sm">
                                        Alen Doe
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        alen@example.com
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        User
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        2022-07-21
                                    </td>
                                    <td class="pl-8 py-4">

                                        <button class="mr-4" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="red" viewBox="0 -960 960 960" width="24">
                                                <path d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="even:bg-blue-50">
                                    <td class="px-6 py-4 text-sm">
                                        Kelwin mark
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        kelwin@example.com
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        User
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        2020-07-06
                                    </td>
                                    <td class="pl-8 py-4">

                                        <button class="mr-4" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="red" viewBox="0 -960 960 960" width="24">
                                                <path d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="even:bg-blue-50">
                                    <td class="px-6 py-4 text-sm">
                                        Dustin
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        dustin@example.com
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        User
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        2021-07-06
                                    </td>
                                    <td class="pl-8 py-4">

                                        <button  title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="red" viewBox="0 -960 960 960" width="24">
                                                <path d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="even:bg-blue-50">
                                    <td class="px-6 py-4 text-sm">
                                        Jams david
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        jams@example.com
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        Candidate
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        2018-09-04
                                    </td>
                                    <td class="pl-8 py-4">

                                        <button class="mr-4" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="red" viewBox="0 -960 960 960" width="24">
                                                <path d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>

    <script src="../../../public/js/burgerMenu.js"></script>

</body>

</html>