<?php
// delete_car.php
include 'db_connection.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['carVin'])) {
    $carVin = $_GET['carVin'];

    // Prepare SQL query to delete the car
    $sql = "DELETE FROM Cars WHERE carVin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $carVin);

    if ($stmt->execute()) {
        echo "Car deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<a href="delete_car.php?carVin=1001">Delete</a>
