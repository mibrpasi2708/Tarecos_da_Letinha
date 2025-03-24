<?php include '../includes/header.php'; ?>
    <h1>Our Products</h1>
    <div class="filter-container">
        <input type="text" id="search" placeholder="Search products..." onkeyup="filterProducts()">
        <select id="category" onchange="filterProducts()">
            <option value="all">All Categories</option>
            <option value="kitchen">Kitchen</option>
            <option value="appliances">Appliances</option>
        </select>
    </div>
    <div id="product-list">
        <?php 
        include '../includes/db.php';
        $result = $conn->query("SELECT * FROM products");
        while ($product = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<div class='product' data-category='{$product['category']}'>{$product['name']} - {$product['price']}";
            if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true) {
                echo " <a href='edit_product.php?id={$product['id']}'>Edit</a> <a href='delete_product.php?id={$product['id']}'>Delete</a>";
            }
            echo "</div>";
        }
        ?>
    </div>
    <script>
        function filterProducts() {
            let search = document.getElementById("search").value.toLowerCase();
            let category = document.getElementById("category").value;
            let products = document.querySelectorAll(".product");
            
            products.forEach(product => {
                let productName = product.textContent.toLowerCase();
                let productCategory = product.getAttribute("data-category");
                
                if ((category === "all" || productCategory === category) && productName.includes(search)) {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });
        }
    </script>
    <?php if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true): ?>
        <a href="admin.php">Manage Products</a>
    <?php endif; ?>
<?php include '../includes/footer.php'; ?>
