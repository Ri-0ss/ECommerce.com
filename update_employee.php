<?php
include '../config.php'; // Include database connection

// Initialize variables
$id = '';
$name = '';
$position = '';
$department = '';
$salary = '';
$hire_date = '';

// Check if id is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // echo "Employee ID: " . htmlspecialchars($id); // Debugging line

    // Fetch existing employee data
    $sql = "SELECT name, position, department, salary, hire_date FROM employee WHERE employee_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name, $position, $department, $salary, $hire_date);
    
    if ($stmt->fetch()) {
        // Successfully fetched data
    } else {
        echo "No employee found with ID: $id";
        exit;
    }

    $stmt->close();
} else {
    // echo "Error: Employee ID not provided.";
    // exit; // Stop script execution if no ID is provided


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Output for debugging
    echo "Form submitted. POST data: ";
    print_r($_POST); // Display all POST data

    // Ensure POST variables are set
    if (isset($_POST['id'], $_POST['name'], $_POST['position'], $_POST['department'], $_POST['salary'], $_POST['hire_date'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];
        $hire_date = $_POST['hire_date'];

        $sql = "UPDATE employee SET name = ?, position = ?, department = ?, salary = ?, hire_date = ? WHERE employee_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdsi", $name, $position, $department, $salary, $hire_date, $id);

        if ($stmt->execute()) {
            header("Location: ../admin.php?msg=Employee updated successfully");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Error: All fields are required.";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Employee</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 20px;
        }
        .card-header {
            border-radius: 20px 20px 0 0;
        }
        .btn-dark {
            width: 40%;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-lg mx-auto" style="max-width: 500px; border-radius:20px;">
            <div class="card-header text-center bg-dark text-white"  style="border-radius:20px 20px 0px 0px;">
                <h4>Update Employee</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="update_employee.php">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position" value="<?php echo htmlspecialchars($position); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <input type="text" class="form-control" id="department" name="department" value="<?php echo htmlspecialchars($department); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary" step="0.01" value="<?php echo htmlspecialchars($salary); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="hire_date" class="form-label">Hire Date</label>
                        <input type="date" class="form-control" id="hire_date" name="hire_date" value="<?php echo htmlspecialchars($hire_date); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-80">Update Employee</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="../admin.php" class="btn btn-warning">Back to Dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
