<?php
require "config.php";

//Dasboard-Contents
$employee_count = $conn->query("SELECT COUNT(*) as total FROM employee")->fetch_assoc()['total'];
$product_count = $conn->query("SELECT COUNT(*) as total FROM products")->fetch_assoc()['total'];
$purchase_count = $conn->query("SELECT COUNT(*) as total FROM purchases")->fetch_assoc()['total'];
$user_count = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc()['total'];
$contact_count = $conn->query("SELECT COUNT(*) as total FROM contacts")->fetch_assoc()['total'];
$inventory_count = $conn->query("SELECT COUNT(*) as total FROM inventory")->fetch_assoc()['total'];


//contacts table
$sqlContacts = "SELECT id, name, email, message, created_at FROM contacts";
$resultContacts = $conn->query($sqlContacts);

// Initialize the $contacts variable
$contacts = [];

if ($resultContacts->num_rows > 0) {
    while ($row = $resultContacts->fetch_assoc()) {
        $contacts[] = $row;
    }
} else {
    $contacts = []; // Set to an empty array if no contacts found
}

//Employee table
$sqlEmployees = "SELECT employee_id, name, position, department, salary, hire_date FROM employee";
$resultEmployees = $conn->query($sqlEmployees);

// Initialize the $employees variable
$employees = [];

if ($resultEmployees->num_rows > 0) {
    while ($row = $resultEmployees->fetch_assoc()) {
        $employees[] = $row;
    }
} else {
    $employees = []; // Set to an empty array if no employees found
}

//inventory table
$sqlInventory = "SELECT inventory_id, product_name, quantity, price, supplier FROM inventory";
$resultInventory = $conn->query($sqlInventory);

// Initialize the $inventory variable
$inventory = [];

if ($resultInventory->num_rows > 0) {
    while ($row = $resultInventory->fetch_assoc()) {
        $inventory[] = $row;
    }
} else {
    $inventory = []; // Set to an empty array if no inventory items found
}

//purchases table
$sqlPurchases = "SELECT id, user_name, user_email, product_id, product_name, quantity, total_price, purchase_date, payment_method FROM purchases";
$resultPurchases = $conn->query($sqlPurchases);

// Initialize the $purchases variable
$purchases = [];

if ($resultPurchases->num_rows > 0) {
    while ($row = $resultPurchases->fetch_assoc()) {
        $purchases[] = $row;
    }
} else {
    $purchases = []; // Set to an empty array if no purchases found
}


//product table
$sqlProducts = "SELECT id, name, description, price, image_path, review_stars, details FROM products";
$resultProducts = $conn->query($sqlProducts);

// Initialize the $products variable
$products = [];

if ($resultProducts->num_rows > 0) {
    while ($row = $resultProducts->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    $products = []; // Set to an empty array if no products found
}



//users table
$sql = "SELECT id, name, email, password, role, created_at FROM users";
$result = $conn->query($sql);

// Initialize the $users variable
$users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    $users = []; // Set to an empty array if no users found
}
// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/admin.css">
    <title>Admin Dashboard</title>
 
</head>
<body>

    <div class="sidebar">
        <h3>Admin Panel</h3>
        <div class="menu-title mt-4">YSTORE</div>
        <a href="javascript:void(0);" onclick="showTable('dashboard')" class="active">Dashboard</a>
        <a href="javascript:void(0);" onclick="showTable('users')" >Users</a>
        <a href="javascript:void(0);" onclick="showTable('employee')">Employee</a>
        <a href="javascript:void(0);" onclick="showTable('products')">Products</a>
        <a href="javascript:void(0);" onclick="showTable('purchases')">Purchases</a>
        <a href="javascript:void(0);" onclick="showTable('inventory')">Inventory</a>
        <a href="javascript:void(0);" onclick="showTable('contacts')">Contacts</a>
        <a href="../logout.php" class="text-info">Logout</a>

    </div>
    
    <div class="main-content">
        <div class="container ">
            <h2 class="mb-4">Dashboard</h2>
            <div id="dashboard">
            <div class="row">                
                <!-- Employee Card -->
                <div id="dashboard" class="dashboard-card" >
                    <h3 style="color: rgb(255, 213, 5);;font-weight:bold;"><i class="fa fa-users" aria-hidden="true"></i> Employees</h3>
                    <p style="color: rgb(0, 0, 0);;font-weight:bold;">Total Data: <?php echo $employee_count; ?></p>
                </div>

                <!-- Products Card -->
                <div id="dashboard" class="dashboard-card">
                    <h3 style="color: rgb(255, 213, 5);;font-weight:bold;">Products</h3>
                    <p  style="color: rgb(0, 0, 0);;font-weight:bold;">Total Data: <?php echo $product_count; ?></p>
                </div>

                <!-- Purchases Card -->
                <div id="dashboard" class="dashboard-card">
                    <h3 style="color:rgb(255, 213, 5);;;font-weight:bold;">Purchases</h3>
                    <p  style="color: rgb(0, 0, 0);;font-weight:bold;">Total Data: <?php echo $purchase_count; ?></p>
                </div>

                <!-- Users Card -->
                <div  id="dashboard" class="dashboard-card">
                    <h3 style="color:rgb(255, 213, 5);;;font-weight:bold;">Users</h3>
                    <p  style="color: rgb(0, 0, 0);;font-weight:bold;">Total Data: <?php echo $user_count; ?></p>
                </div>

                <!-- Contacts Card -->
                <div id="dashboard" class="dashboard-card">
                    <h3 style="color:rgb(255, 213, 5);;font-weight:bold;">Contacts</h3>
                    <p  style="color: rgb(0, 0, 0);;font-weight:bold;">Total Data: <?php echo $contact_count; ?></p>
                </div>

                <!-- Inventory Card -->
                <div id="dashboard" class="dashboard-card">
                    <h3 style="color:rgb(255, 213, 5);;font-weight:bold;">Inventory</h3>
                    <p  style="color: rgb(0, 0, 0);;font-weight:bold;">Total Data: <?php echo $inventory_count; ?></p>
                </div>
            </div>
            </div>
            
            <!-- Users Table -->
            <div class="dashboard-card" id="users">
                <div class="card-header">
                    <h4>Users</h4>
                    <input type="text"  id="search-users" placeholder="Search Users" onkeyup="searchTable('users')" class="form-control mb-3">
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assuming $users contains the fetched data from the users table
                    foreach ($users as $user) {
                        echo "<tr>
                            <td>{$user['id']}</td>
                            <td>{$user['name']}</td>
                            <td>{$user['email']}</td>
                            <td>{$user['password']}</td>
                            <td>{$user['role']}</td>
                            <td>{$user['created_at']}</td>
                            <td>
                                <a href='add-forms/add_user.php' class='btn btn-dark btn-sm'>Add</a>
                                <a href='update-forms/update_user.php?id={$user['id']}' class='btn btn-info btn-sm'>Update</a>
                                <a href='delete-forms/delete_user.php?id={$user['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                
                            </td>               

                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
                </div>
            </div>
        </div>

            <!-- Products Table -->
            <div class="dashboard-card" id="products">
                <div class="card-header">
                    <h5>Products</h5>
                    <input type="text" id="search-products" placeholder="Search Products" onkeyup="searchTable('products')" class="form-control mb-3">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>image_path</th>
                                <th>Details</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP code to fetch and display products -->
                            <?php
                            // Assuming $products contains the fetched data from the products table
                            foreach ($products as $product) {
                                echo "<tr>
                                    <td>{$product['id']}</td>
                                    <td>{$product['name']}</td>
                                    <td>{$product['description']}</td>
                                    <td>{$product['price']}</td>
                                    <td>{$product['image_path']}</td>
                                     <td>{$product['details']}</td>
                                    <td>
                                        <a href='add-forms/add_product.php' class='btn btn-dark btn-sm'>Add</a>
                                        <a href='update-forms/update_product.php?id={$product['id']}' class='btn btn-info btn-sm'>Update</a>
                                        <a href='delete-forms/delete_product.php?id={$product['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

            <!-- Purchases Table -->
            <div class="dashboard-card" id="purchases">
                <div class="card-header">
                    <h5>Purchases</h5>
                    <input type="text" id="search-purchases" placeholder="Search Purchases" onkeyup="searchTable('purchases')" class="form-control mb-3">
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>email</th>
                                <th>product id</th>
                                <th>product name</th>
                                <th>quantity</th>
                                <th>Total</th>
                                <th>purchase date</th>
                                <th>payment method</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP code to fetch and display purchases -->
                            <?php
                            // Assuming $purchases contains the fetched data from the purchases table
                            foreach ($purchases as $purchase) {
                                echo "<tr>
                                    <td>{$purchase['id']}</td>
                                    <td>{$purchase['user_name']}</td>
                                    <td>{$purchase['user_email']}</td>
                                    <td>{$purchase['product_id']}</td>
                                    <td>{$purchase['product_name']}</td>
                                    <td>{$purchase['quantity']}</td>
                                    <td>{$purchase['total_price']}</td>
                                    <td>{$purchase['purchase_date']}</td>
                                    <td>{$purchase['payment_method']}</td>
                                    <td>
                                        <a href='delete-forms/delete_purchase.php?id={$purchase['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

            <!-- Inventory Table -->
            <div class="dashboard-card" id="inventory">
                <div class="card-header">
                    <h5>Inventory</h5>
                    <input type="text" id="search-inventory" placeholder="Search Inventory" onkeyup="searchTable('inventory')" class="form-control mb-3">
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product name</th>
                                <th>quantity</th>
                                <th>price</th>
                                <th>supplier</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP code to fetch and display inventory -->
                            <?php
                            // Assuming $inventory contains the fetched data from the inventory table
                            foreach ($inventory as $item) {
                                echo "<tr>
                                    <td>{$item['inventory_id']}</td>
                                    <td>{$item['product_name']}</td>
                                    <td>{$item['quantity']}</td>
                                    <td>{$item['price']}</td>
                                    <td>{$item['supplier']}</td>
                                    <td>
                                        <a href='add-forms/add_inventory.php' class='btn btn-dark btn-sm'>Add</a>
                                        <a href='update-forms/update_inventory.php?id={$item['inventory_id']}' class='btn btn-info btn-sm'>Update</a>
                                        <a href='delete-forms/delete_inventory.php?id={$item['inventory_id']}' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

             <!-- Employee Table -->
             <div class="dashboard-card" id="employee">
                <div class="card-header">
                    <h5>Employees</h5>
                    <input type="text" id="search-employee" placeholder="Search Employee" onkeyup="searchTable('employee')" class="form-control mb-3">
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Position</th>
                                <th>department</th>
                                <th>salary</th>
                                <th>Hire date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP code to fetch and display inventory -->
                            <?php
                            // Assuming $inventory contains the fetched data from the inventory table
                            foreach ($employees as $employee) {
                                echo "<tr>
                                    <td>{$employee['employee_id']}</td>
                                    <td>{$employee['name']}</td>
                                    <td>{$employee['position']}</td>
                                    <td>{$employee['department']}</td>
                                    <td>{$employee['salary']}</td>
                                     <td>{$employee['hire_date']}</td>
                                    <td>
                                        <a href='add-forms/add_employee.php' class='btn btn-dark btn-sm'>Add</a>
                                        <a href='update-forms/update_employee.php?id={$employee['employee_id']}' class='btn btn-info btn-sm'>Update</a>
                                        <a href='delete-forms/delete_employee.php?id={$employee['employee_id']}' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

            <!-- Contacts Table -->
            <div class="dashboard-card" id="contacts">
                <div class="card-header">
                    <h5>Contacts</h5>
                    <input type="text" id="search-contacts" placeholder="Search Contacts" onkeyup="searchTable('contacts')" class="form-control mb-3">
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP code to fetch and display contacts -->
                            <?php
                            // Assuming $contacts contains the fetched data from the contacts table
                            foreach ($contacts as $contact) {
                                echo "<tr>
                                    <td>{$contact['id']}</td>
                                    <td>{$contact['name']}</td>
                                    <td>{$contact['email']}</td>
                                    <td>{$contact['message']}</td>
                                    <td>{$contact['created_at']}</td>
                                    <td>
                                        <a href='delete-forms/delete_contact.php?id={$contact['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="JS/admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
