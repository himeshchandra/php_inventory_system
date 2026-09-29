<?php
session_start();
require_once "header.php";
require_once "sidebar.php";
require_once "config/database.php";
$product_data = "SELECT * FROM products";
$db_connection = $conn->prepare($product_data);
$db_connection->execute([]);
$product_info = $db_connection->fetchAll(PDO::FETCH_ASSOC);
// var_dump($product_info);
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
<div class="bg-white p-1 rounded-xl border border-gray-200 shadow-sm overflow-x-auto mt-6">
    <table class="table-fixed w-full text-left text-sm text-gray-600">
        <thead class="bg-gray-100 text-xs uppercase text-gray-700">
            <tr>
                <th class="px-6 py-3">Product Name</th>
                <th class="px-6 py-3">Product Code</th>
                <th class="px-6 py-3">Units</th>
                <th class="px-6 py-3">Purchase Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product_info as $p_info) { ?>
                <tr>
                    <td class="px-6 py-4 font-medium text-gray-900"><?php echo $p_info['product_name'] ?></td>
                    <td class="px-6 py-4"><?php echo $p_info['product_code'] ?></td>
                    <td class=" px-6 py-4"><?php echo $p_info['unit'] ?></td>
                    <td class="px-6 py-4"><?php echo $p_info['purchase_price'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
require_once "footer.php"
?>