<?php
include '../config.php'; // Include database connection

// Initialize variables to avoid "undefined variable" warnings
$name = '';
$position = '';
$department = '';
$salary = '';
$hire_date = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'] ?? '';
    $position = $_POST['position'] ?? '';
    $department = $_POST['department'] ?? '';
    $salary = $_POST['salary'] ?? ''; // Make sure this is a numeric value
    $hire_date = $_POST['hire_date'] ?? '';

    // Prepare SQL statement for inserting a new employee
    $sql = "INSERT INTO employee (name, position, department, salary, hire_date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Ensure that the SQL statement was prepared successfully
    if ($stmt) {
        // Corrected bind_param
        $stmt->bind_param("sssds", $name, $position, $department, $salary, $hire_date);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            header("Location: ../admin.php?msg=Employee added successfully");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Employee</title>
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
            <div class="card-header text-center bg-dark text-white" style="border-radius:20px 20px 0px 0px;">
                <h4>Add Employee</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="add_employee.php">
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
                    <button type="submit" class="btn btn-dark w-80">Add Employee</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="../admin.php" class="btn btn-danger">Back to Dashboard</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
