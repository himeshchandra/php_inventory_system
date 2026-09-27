<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="flex justify-center items-center min-h-screen">
        <div class="border-2 border-indigo-600 w-[350px] h-56 p-2">
            <label for="">User Name</label>
            <div class="">
                <input type="email" class="border border-gray-300 outline-blue-400 rounded w-full p-1">
            </div>

            <label for="">Password</label>
            <div class="pb-6">
                <input type="password" class="border border-gray-300 outline-blue-400 rounded w-full p-1">
            </div>

            <button type="submit"
                class="py-1 border hover:bg-blue-500 text-blue-700 font-semibold hover:text-white w-full p-1">Submit</button>

        </div>
    </div>

</body>

</html>