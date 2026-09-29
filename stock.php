<?php
session_Start();
require_once "header.php";
require_once "sidebar.php";
?>

<div class="grid grid-cols-4 gap-6 mt-6">

    <div class="bg-white p-6 rounded-xl border shadow-sm">

        <p class="text-gray-500">
            Total Products
        </p>

        <h3 class="text-3xl font-bold mt-2">
            250
        </h3>

    </div>


    <div class="bg-white p-6 rounded-xl border shadow-sm">

        <p class="text-gray-500">
            Total Stock
        </p>

        <h3 class="text-3xl font-bold mt-2">
            1,250
        </h3>

    </div>
    <div class="bg-white p-6 rounded-xl border shadow-sm">

        <p class="text-gray-500">
            Low Stock
        </p>

        <h3 class="text-3xl font-bold mt-2 text-red-500">
            12
        </h3>

    </div>

    <div class="bg-white p-6 rounded-xl border shadow-sm">

        <p class="text-gray-500">
            Out of Stock
        </p>

        <h3 class="text-3xl font-bold mt-2">
            ₹25,500
        </h3>

    </div>
</div>
<?php
require_once "footer.php";
?>