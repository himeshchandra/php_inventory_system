<?php
$user_name = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventory System</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">

        <div>
            <h1 class="text-xl font-bold text-indigo-600">
                Inventory System
            </h1>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-gray-600">
                Welcome, <?php echo $user_name; ?>
            </span>
            <a href="logout.php"
               class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                Logout
            </a>
        </div>
    </header>