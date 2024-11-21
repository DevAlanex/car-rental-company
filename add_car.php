<?php
// add_car.php
include 'db_connection.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form input values
    $carVin = $_POST['carVin'];
    $carMake = $_POST['carMake'];
    $carModel = $_POST['carModel'];
    $carYear = $_POST['carYear'];
    $carColor = $_POST['carColor'];
    $carDailyPrice = $_POST['carDailyPrice'];
    $locationId = $_POST['locationId'];

    // Prepare SQL query to insert car data
    $stmt = $conn->prepare("INSERT INTO Cars (carVin, carMake, carModel, carYear, carColor, carDailyPrice, locationId) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssdi", $carVin, $carMake, $carModel, $carYear, $carColor, $carDailyPrice, $locationId);

    if ($stmt->execute()) {
        echo "New car added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
