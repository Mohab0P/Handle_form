<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 p-8">
            <?php


    ?>

        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">

            <h1 class="text-2xl font-bold mb-4">Contact Information:</h1>
            <form action="validate.php" method="post">
                <div class="mb-4">

                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full border-solid border-2 border-gray-500 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <p class="text-red-500 text-sm mt-1"></p>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full border-solid border-2 border-gray-500 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <p class="text-red-500 text-sm mt-1"></p></div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Phone:</label>
                    <input type="text" id="phone" name="phone" class="mt-1 block w-full border-solid border-2 border-gray-500 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <p class="text-red-500 text-sm mt-1"></p></div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700">Message:</label>
                    <textarea id="message" name="message" class="mt-1 block w-full border-solid border-2 border-gray-500 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 "></textarea>
                    <p class="text-red-500 text-sm mt-1"></p></div>
                <button type="submit" class="w-full py-2 text-white border-2 rounded-lg transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-300">Send</button>
            </form>  
            </div>
</body>
</html>