<?php
$active = 'stocks';
session_start();
require_once "header.php";
require_once "sidebar.php";
require_once "config/database.php";
$product_data = "SELECT product_name,id AS product_id FROM products";
$db_connection = $conn->prepare($product_data);
$db_connection->execute([]);
$product_info = $db_connection->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="bg-white p-1 rounded-xl border shadow-sm">
    <form action="stockin_succ.php" class="p-6" method="POST">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-4">
            <div>
                <label for="unit" class="block mb-2 text-sm font-medium text-gray-700">
                    Product Name
                </label>
                <select
                    onchange="getProductInfo()"
                    id="product_id"
                    name="product_id"
                    class="w-full px-3 py-2 border border-indigo-300 rounded-md outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required>
                    <option value="">Select</option>
                    <?php foreach ($product_info as $p) { ?>
                        <option value="<?php echo $p['product_id'] ?>"><?php echo $p['product_name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <label for="sku" class="block mb-2 text-sm font-medium text-gray-700">
                    Product Code
                </label>
                <input
                    id="product_code"
                    name="product_code"
                    type="text"
                    class="w-full rounded-md border border-indigo-300 px-3 py-2 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-700">
                    Category
                </label>
                <input
                    id="category"
                    name="category"
                    type="text"
                    class="w-full rounded-md border border-indigo-300 px-3 py-2 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
            <div>
                <label for="purchase-price" class="block mb-2 text-sm font-medium text-gray-700">
                    Available Stock
                </label>
                <input
                    id="current_stock"
                    name="current_stock"
                    type="number"
                    step="0.01"
                    class="w-full px-3 py-2 border border-indigo-300 rounded-md outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required
                    placeholder="Current Stock" disabled>
            </div>
            <div>
                <label for="purchase-price" class="block mb-2 text-sm font-medium text-gray-700">
                    Quantity
                </label>
                <input
                    id="quantity"
                    name="quantity"
                    type="number"
                    step="0.01"
                    class="w-full px-3 py-2 border border-indigo-300 rounded-md outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required
                    placeholder="Enter Quantity">
            </div>
        </div>
        <div class="flex justify-center gap-4">
            <a href="stock.php">
                <button type="button" class="px-5 py-2.5 bg-gray-500 text-white font-medium rounded-md hover:bg-gray-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400">Back</button>
            </a>
            <button type="submit" class="px-5 py-2.5 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-500">Add Stock</button>
        </div>
    </form>
</div>
<?php
require_once "footer.php";
?>
<script>
    function getProductInfo() {
        let product_id = document.getElementById("product_id").value
        if (product_id) {
            axios.post("getproductInfo.php", new URLSearchParams({
                    product_id: product_id
                }))
                .then(res => {
                    let product = res.data.data;
                    let product_code = product.product_code;
                    let category = product.category;
                    let current_Stock = product.cur_stock;
                    document.getElementById("current_stock").value = current_Stock
                    document.getElementById("product_code").value = product_code
                    document.getElementById("category").value = category

                })
                .catch(err => {
                    console.log(err)
                })
        } else {
            alert("Select product")
        }

    }
</script>