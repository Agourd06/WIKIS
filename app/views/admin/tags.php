<!DOCTYPE html>
<html lang="es">

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

</head>

<body class="bg-gray-100">
    <div class="flex flex-col h-screen bg-gray-100">


        <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
            <div class="flex items-center">
                <div class="flex items-center">
                    <img src="../public/images/logoblack.png" alt="Logo" class="w-28 h-18 mr-2">
                </div>
            </div>

        <!-- --------------------------------burger icon ----------------------------- -->
        <div class="space-x-5">
                <button type="button" id="burger" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
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
            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="users">
                <i class="fas fa-users mr-2"></i>Authors
            </a>

            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="Categories.php">
                <i class="fas fa-file-alt mr-2"></i>Categorys
            </a>

            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="products">
                <i class="fas fa-store mr-2"></i>Wikis
            </a>
            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="products">
                <i class="fas fa-store mr-2"></i>Tags
            </a>
        </div>
        <!-- --------------------------------burger menu ----------------------------- -->

        <div  class="flex-1 flex flex-wrap">

            <div class="p-2 bg-white w-full md:w-60 flex flex-col md:flex hidden" id="sideNav">
                <nav><a class="block text-black font-bold py-2.5 px-4 my-4 rounded duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="index.php">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>
                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="users">
                        <i class="fas fa-users mr-2"></i>Authors
                    </a>

                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="Categories.php">
                        <i class="fas fa-file-alt mr-2"></i>Categorys
                    </a>

                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="products">
                        <i class="fas fa-store mr-2"></i>Wikis
                    </a>
                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="products">
                        <i class="fas fa-store mr-2"></i>Tags
                    </a>

                </nav>

                <a class="block text-black font-bold py-2.5 px-4 my-2 rounded duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white mt-auto" href="#">
                    <i class="fas fa-sign-out-alt mr-2"></i>Log Out
                </a>


            </div>

            <div class="flex-1 p-4 w-full md:w-1/2">


                <div class="text-right mt-4">
                    <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">


                        add Category

                    </button>
                </div>
                <div class="mt-8 bg-white p-4 shadow rounded-lg mx-auto min-h-1/2">

                    <h2 class="text-gray-500 text-lg font-semibold pb-4">Categorys</h2>
                    <div class="my-1"></div>
                    <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
                    <table id="dataTable" class="w-full table-auto text-sm text-center">
                        <thead class="text-sm leading-normal">
                            <tr>
                                <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                    ID
                                </th>
                                <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                    Image
                                </th>
                                <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                    Title
                                </th>
                                <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                    Description
                                </th>

                                <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                    action
                                </th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr class="text-sm">
                                <td class=" px-4  border-b border-grey-light">id</td>
                                <td class=" px-16 border-b border-grey-light flex justify-center"><img class="" src="" alt="image"></td>
                                <td class=" px-4  border-b border-grey-light">vrsczz</td>
                                <td class=" px-16 border-b border-grey-light ">hfgtffy</td>
                                <td class="flex items-center h-full justify-center">
                                    <button type="button" name="update" value="">


                                        <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                        </svg>


                                    </button>
                                    <button type="button" name="delete" value="">

                                        <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                        </svg>

                                    </button>
                                </td>
                            </tr>
                            <tr class="text-sm">
                                <td class=" px-4  border-b border-grey-light">id</td>
                                <td class=" px-16 border-b border-grey-light flex justify-center"><img class="" src="" alt="image"></td>
                                <td class=" px-4  border-b border-grey-light">vrz</td>
                                <td class=" px-16 border-b border-grey-light ">hfgtffy</td>
                                <td class="flex items-center h-full justify-center">
                                    <button type="button" name="update" value="">


                                        <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                        </svg>


                                    </button>
                                    <button type="button" name="delete" value="">

                                        <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                        </svg>

                                    </button>
                                </td>
                            </tr>
                            <tr class="text-sm">
                                <td class=" px-4  border-b border-grey-light">id</td>
                                <td class=" px-16 border-b border-grey-light flex justify-center"><img class="" src="" alt="image"></td>
                                <td class=" px-4  border-b border-grey-light">vrz</td>
                                <td class=" px-16 border-b border-grey-light ">hfgtffy</td>
                                <td class="flex items-center h-full justify-center">
                                    <button type="button" name="update" value="">


                                        <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                        </svg>


                                    </button>
                                    <button type="button" name="delete" value="">

                                        <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                        </svg>

                                    </button>
                                </td>
                            </tr>
                            <tr class="text-sm">
                                <td class=" px-4  border-b border-grey-light">id</td>
                                <td class=" px-16 border-b border-grey-light flex justify-center"><img class="" src="" alt="image"></td>
                                <td class=" px-4  border-b border-grey-light">vrz</td>
                                <td class=" px-16 border-b border-grey-light ">hfgtffy</td>
                                <td class="flex items-center h-full justify-center">
                                    <button type="button" name="update" value="">


                                        <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                        </svg>


                                    </button>
                                    <button type="button" name="delete" value="">

                                        <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
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

    <script src="../../../public/js/burgerMenu.js"></script>

</body>

</html>