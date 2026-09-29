<?php
session_start();
require_once "header.php";
require_once "sidebar.php";
?>

<div class="bg-white p-1 rounded-xl border shadow-sm">
    <form action="add_product_succ.php" class="p-6" method="POST">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-4">
            <div>
                <label for="product-name" class="block mb-2 text-sm font-medium text-gray-700">
                    Product Name
                </label>
                <input
                    id="product_name"
                    name="product_name"
                    type="text"
                    class="w-full rounded-md border border-indigo-300 px-3 py-2 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required >
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Unit -->
            <div>
                <label for="unit" class="block mb-2 text-sm font-medium text-gray-700">
                    Unit
                </label>
                <select
                    id="unit"
                    name="unit"
                    class="w-full px-3 py-2 border border-indigo-300 rounded-md outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required>
                    <option value="">Select Unit</option>
                    <option value="piece">Piece</option>
                    <option value="box">Box</option>
                    <option value="pack">Pack</option>
                    <option value="kg">Kilogram (Kg)</option>
                    <option value="liter">Liter (L)</option>
                    <option value="meter">Meter (m)</option>
                </select>
            </div>

            <!-- Purchase Price -->
            <div>
                <label for="purchase-price" class="block mb-2 text-sm font-medium text-gray-700">
                    Purchase Price
                </label>
                <input
                    id="purchase-price"
                    name="purchase_price"
                    type="number"
                    step="0.01"
                    class="w-full px-3 py-2 border border-indigo-300 rounded-md outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required
                    placeholder="Enter purchase price">
            </div>

            <!-- Selling Price -->
            <div>
                <label for="selling-price" class="block mb-2 text-sm font-medium text-gray-700">
                    Selling Price
                </label>
                <input
                    id="selling-price"
                    name="selling_price"
                    type="number"
                    step="0.01"
                    class="w-full px-3 py-2 border border-indigo-300 rounded-md outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required
                    placeholder="Enter selling price">
            </div>

            <!-- Minimum Stock Level -->
            <div>
                <label for="minimum-stock" class="block mb-2 text-sm font-medium text-gray-700">
                    Minimum Stock Level
                </label>
                <input
                    id="minimum-stock"
                    name="minimum_stock"
                    type="number"
                    min="0"
                    class="w-full px-3 py-2 border border-indigo-300 rounded-md outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required
                    placeholder="Enter minimum stock">
            </div>

        </div>
        <div class="flex justify-center gap-4">
            <a href="products.php">
                <button type="button" class="px-5 py-2.5 bg-gray-500 text-white font-medium rounded-md hover:bg-gray-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400">Back</button>
            </a>
            <button type="submit" class="px-5 py-2.5 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition duration-200            focus:outline-none focus:ring-2 focus:ring-green-500">Submit</button>
        </div>
    </form>
</div>

<?php
require_once "footer.php"
?>