<?php
session_start();
require_once "header.php";
require_once "sidebar.php";
require_once "config/database.php";
$products_list = $conn->query("SELECT id AS product_id,product_name FROM products ORDER BY product_name")->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="bg-white p-1 rounded-xl border shadow-sm">
    <form action="" class="p-6" method="POST" onsubmit="return quantityCheck()">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-4">
            <div>
                <label for="Customer name" class="block mb-2 text-sm font-medium text-gray-700">
                    Customer Name
                </label>
                <input
                    id="customer_name"
                    name="customer_name"
                    type="text"
                    class="w-full rounded-md border border-indigo-300 px-3 py-2 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="Sale Date" class="block mb-2 text-sm font-medium text-gray-700">
                    Sale Date
                </label>
                <input
                    id="sale_date"
                    name="sale_date"
                    type="date"
                    class="w-full rounded-md border border-indigo-300 px-3 py-2 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required>
            </div>
            <div>
                <label for="unit" class="block mb-2 text-sm font-medium text-gray-700">
                    Product Name
                </label>
                <select
                    id="product_id"
                    name="product_id"
                    class="w-full px-3 py-2 border border-indigo-300 rounded-md outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required onchange="getCurrentStock()">
                    <option value="">Select</option>
                    <?php foreach ($products_list as $p) { ?>
                        <option value="<?php echo $p['product_id'] ?>"><?php echo $p['product_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
            <div>
                <label for="Availabilty-price" class="block mb-2 text-sm font-medium text-gray-700">
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
                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-700">
                    Quantity
                </label>
                <input
                    id="quantity"
                    name="quantity"
                    type="number"
                    step="0.01"
                    class="w-full px-3 py-2 border border-indigo-300 rounded-md outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required
                    placeholder="Enter Quantity" required>
            </div>
            <div>
                <label for="Sale-price" class="block mb-2 text-sm font-medium text-gray-700">
                    Sale Price
                </label>
                <input
                    id="sale_price"
                    name="sale_price"
                    type="number"
                    step="0.01"
                    class="w-full px-3 py-2 border border-indigo-300 rounded-md outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required
                    placeholder="Enter Sale price" required>
            </div>
        </div>
        <div class="flex justify-center gap-4">
            <!-- <a href="">
                <button type="button" class="px-5 py-2.5 bg-gray-500 text-white font-medium rounded-md hover:bg-gray-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400">Back</button>
            </a> -->
            <button type="submit" id="submitBtn" class="px-5 py-2.5 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-500">Purchase</button>
        </div>
    </form>
</div>
<script>
    function getCurrentStock() {
        let product_id = document.getElementById("product_id").value
        if (product_id) {
            axios.post("getstock.php", new URLSearchParams({
                    product_id: product_id
                }))
                .then(res => {
                    console.log(res)
                    let current_stock = res.data.data;
                    document.getElementById("current_stock").value = current_stock
                })
                .catch(err => {
                    console.log(err)
                })
        } else {
            alert("Select product")
        }
    }

    function quantityCheck() {
        let current_stock = parseFloat(
            document.getElementById("current_stock").value
        );

        let entered_stock = parseFloat(
            document.getElementById("quantity").value
        );

        if (isNaN(entered_stock) || entered_stock <= 0) {
            document.getElementById("submitBtn").disabled = true;
            alert("Entered Quantity Must be greater than 0")
            return false;
        }

        if (entered_stock > current_stock) {
            alert("Entered quantity must be less than or equal to available stock");
            document.getElementById("submitBtn").disabled = true;
            return false
        } else {
            document.getElementById("submitBtn").disabled = false;
            return true;
        }
    }
</script>
<?php
require_once "footer.php"
?>