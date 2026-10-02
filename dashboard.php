<?php
$active = "dashboard";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
require_once "header.php";
require_once "sidebar.php";
require_once "config/database.php";

$total_products = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
$total_purchase = $conn->query("SELECT COALESCE(SUM(total_amount),0) FROM purchase")->fetchColumn();
$total_sales = $conn->query("SELECT COALESCE(SUM(total_amount),0) FROM sales")->fetchColumn();
$low_stock = $conn->query("SELECT COUNT(*)
FROM (
    SELECT 
        p.id,
        p.minimum_stock,
        COALESCE(SUM(CASE WHEN st.type = 'IN' THEN st.quantity ELSE 0 END), 0)
        -
        COALESCE(SUM(CASE WHEN st.type = 'OUT' THEN st.quantity ELSE 0 END), 0) AS current_stock
    FROM products p
    LEFT JOIN stock_transactions st 
        ON p.id = st.product_id
    GROUP BY p.id, p.minimum_stock
) AS stock_summary
WHERE current_stock <= minimum_stock;
")->fetchColumn();


?>
<div>

    <h2 class="text-2xl font-bold text-gray-800">
        Dashboard
    </h2>

    <p class="text-gray-500 mt-1">
        Overview of your inventory
    </p>

</div>
<div class="grid grid-cols-4 gap-6 mt-6">

    <div class="bg-white p-6 rounded-xl border shadow-sm">

        <p class="text-gray-500">
            Total Products
        </p>

        <h3 class="text-3xl font-bold mt-2">
            <?php echo $total_products ?>
        </h3>

    </div>


    <div class="bg-white p-6 rounded-xl border shadow-sm">

        <p class="text-gray-500">
            Total Purchase
        </p>

        <h3 class="text-3xl font-bold mt-2">
            <?php echo $total_purchase ?>
        </h3>

    </div>


    <div class="bg-white p-6 rounded-xl border shadow-sm">

        <p class="text-gray-500">
            Today's Sales
        </p>

        <h3 class="text-3xl font-bold mt-2">
            <?php echo $total_sales ?>
        </h3>

    </div>


    <div class="bg-white p-6 rounded-xl border shadow-sm">

        <p class="text-gray-500">
            Low Stock
        </p>

        <h3 class="text-3xl font-bold mt-2 text-red-500">
            <?php echo $low_stock ?>
        </h3>

    </div>

</div>

<?php
require_once 'footer.php';
?>