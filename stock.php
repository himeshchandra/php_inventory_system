<?php
session_Start();
require_once "header.php";
require_once "sidebar.php";
require_once "config/database.php";
$stock_query = "SELECT 
p.product_name,p.minimum_stock,p.product_code,
COALESCE(SUM(CASE WHEN st.type = 'IN' THEN st.quantity ELSE 0 END),0) - COALESCE(SUM(CASE WHEN st.type = 'OUT' THEN st.quantity ELSE 0 END),0) AS cur_stock
FROM products p LEFT JOIN stock_transactions st ON p.id = st.product_id GROUP BY p.id ORDER BY p.id";
$db_connection = $conn->prepare($stock_query);
$db_connection->execute([]);
$stock_info = $db_connection->fetchAll(PDO::FETCH_ASSOC);
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
<div class="bg-white p-1 rounded-xl border shadow-sm mt-2">
    <div class="flex justify-between p-2">
        <h3 class="text-3xl font-bold mt-2">
            Stock
        </h3>
        <div class="gap-6">
            <a href="stockin.php">
                <button class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-blue-700">
                    Stock IN
                </button>
            </a>
            <a href="stockout.php">
                <button class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-blue-700">
                    Stock Out
                </button>
            </a>
        </div>
    </div>
    <div class="mt-2">
        <table class="table-fixed w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-100 text-xs uppercase text-gray-700">
                <tr>
                    <th class="px-6 py-3">Product Name</th>
                    <th class="px-6 py-3">Product Code</th>
                    <th class="px-6 py-3">Available Stock</th>
                    <th class="px-6 py-3">Minimum Stock</th>
                    <th class="px-6 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stock_info as $st_info) { ?>
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900"><?php echo $st_info['product_name'] ?></td>
                        <td class="px-6 py-4"><?php echo $st_info['product_code'] ?></td>
                        <td class=" px-6 py-4"><?php echo $st_info['cur_stock'] ?></td>
                        <td class="px-6 py-4"><?php echo $st_info['minimum_stock'] ?></td>
                        <td class="px-6 py-4"><?php if ($st_info['cur_stock'] == 0) {
                                                    echo "Out of Stock";
                                                } elseif ($st_info['cur_stock'] <= $st_info['minimum_stock']) {
                                                    echo "Low Stock";
                                                } else {
                                                    echo "In Stock";
                                                }
                                                ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once "footer.php";
?>