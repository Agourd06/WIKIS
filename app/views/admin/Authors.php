<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-w-full">
    <div class="flex flex-col min-w-full h-screen bg-gray-100">

        <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
            <div class="flex items-center">
                <div class="flex items-center">
                    <img src="../public/images/logoblack.png" alt="Logo" class="w-28 h-18 mr-2">
                </div>
            </div>
            <div class="space-x-5">
                <button type="button" id="burger" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="burgerbar" class="hidden absolute top-0 right-0 w-72 md:w-1/6 bg-slate-200 opacity-75 flex flex-col font-bold text-xl gap-6 min-h-screen pl-2">
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
            </a>        </div>

        <div class="md:flex-1 min-w-full md:flex md:flex-wrap">
            <div class="p-2 bg-white w-full md:w-60 flex flex-col md:flex hidden" id="sideNav">
            <nav><a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="index.php">
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

                </nav>

                <a class="block text-black font-bold py-2.5 px-4 my-2 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white mt-auto" href="#">
                    <i class="fas fa-sign-out-alt mr-2"></i>Log Out
                </a>
            </div>

            <div class="flex-1 p-4 min-w-full md:w-1/2">
                <div class="text-right mt-4">
                    <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                        add Category
                    </button>
                </div>

                <div class="mt-8 min-w-full bg-white p-4 shadow rounded-lg">
                    <h2 class="text-gray-500 text-lg font-semibold pb-4">Categories</h2>
                    <div class="my-1"></div>
                    <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
                    <div class="overflow-x-auto">
                        <table class="w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Jane Doe</td>
                                <td class="px-6 py-4 whitespace-nowrap">jane@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap">Admin</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>
                                    <button class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                                <td class="px-6 py-4 whitespace-nowrap">john@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap">User</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>
                                    <button class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
                                </td>
                            </tr>
                        </tbody>                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../public/js/burgerMenu.js"></script>
</body>

</html>
