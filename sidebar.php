<div class="flex">
    <aside class="w-56 min-h-[calc(100vh-4rem)] bg-white border-r border-gray-200">

        <nav class="p-4">

            <ul class="space-y-2">

                <li>
                    <a href="dashboard.php"
                        class="<?php echo $active == 'dashboard' ? 'bg-indigo-100 text-indigo-700' :'text-gray-700'?> block px-4 py-3 rounded-lg text-gray-700 hover:bg-indigo-100 hover:text-indigo-700">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="products.php"
                        class="<?php echo $active == 'products' ? 'bg-indigo-100 text-indigo-700' :'text-gray-700'?> block px-4 py-3 rounded-lg text-gray-700 hover:bg-indigo-100 hover:text-indigo-700">
                        Products
                    </a>
                </li>

                <li>
                    <a href="stock.php"
                        class=" <?php echo $active == 'stocks' ? 'bg-indigo-100 text-indigo-700' :'text-gray-700'?> block px-4 py-3 rounded-lg text-gray-700 hover:bg-indigo-100 hover:text-indigo-700">
                        Stock
                    </a>
                </li>

                <li>
                    <a href="sales.php"
                        class="<?php echo $active == 'sales' ? 'bg-indigo-100 text-indigo-700' :'text-gray-700'?> block px-4 py-3 rounded-lg text-gray-700 hover:bg-indigo-100 hover:text-indigo-700">
                        Sales
                    </a>
                </li>

                <li>
                    <a href="purchase.php"
                        class="<?php echo $active == 'purchase' ? 'bg-indigo-100 text-indigo-700' :'text-gray-700' ?> block px-4 py-3 rounded-lg text-gray-700 hover:bg-indigo-100 hover:text-indigo-700">
                        Purchases
                    </a>
                </li>
            </ul>

        </nav>

    </aside>
    <main class="flex-1 p-6">