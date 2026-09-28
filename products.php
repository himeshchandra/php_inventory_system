<?php
session_start();
require_once "header.php";
require_once "sidebar.php";
?>

<div class="bg-white p-1 rounded-xl border shadow-sm">
    <div class="flex justify-between p-2">
        <h3 class="text-3xl font-bold mt-2">
            Products
        </h3>
        <a href="add_product.php">
            <button class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-blue-700">
                Add Product
            </button>
        </a>
    </div>
</div>
<!-- <div class="bg-white p-1 rounded-xl border shadow-sm">

</div> -->
<?php
require_once "footer.php"
?>