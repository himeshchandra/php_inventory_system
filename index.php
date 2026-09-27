<?php
$error = $_GET['error'] ?? null;
?>
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
        <form action="login_succ.php" method="POST">
            <div class="border-2 border-gray-600 rounded-xl  w-[350px] p-5">
                <h1 class="font-bold text-3xl mb-3">Login</h1>
                <label for="">User Name</label>
                <div class="pb-3">
                    <input type="email" name="email" class="border border-gray-300 outline-blue-400 rounded w-full p-1">
                </div>
    
                <label for="">Password</label>
                <div class="pb-6">
                    <input type="password" name="password" class="border border-gray-300 outline-blue-400 rounded w-full p-1">
                </div>
                <?php if($error):?>
                        <p class="text-red-500">
                           <?php echo htmlspecialchars($error); ?>
                        </p>
                 <?php endif; ?>
                <button type="submit"
                    class="py-1 border hover:bg-blue-200 hover:text-blue-500 text-white bg-blue-500 rounded-lg font-semibold w-full p-1">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>