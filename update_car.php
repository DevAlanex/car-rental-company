<?php
// update_car.php
include 'db_connection.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['carVin'])) {
    $carVin = $_GET['carVin'];

    // Fetch the current car data to pre-fill the update form
    $sql = "SELECT * FROM Cars WHERE carVin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $carVin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $car = $result->fetch_assoc();
    } else {
        echo "Car not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update car details
    $carVin = $_POST['carVin'];
    $carMake = $_POST['carMake'];
    $carModel = $_POST['carModel'];
    $carYear = $_POST['carYear'];
    $carColor = $_POST['carColor'];
    $carDailyPrice = $_POST['carDailyPrice'];
    $locationId = $_POST['locationId'];

    $sql = "UPDATE Cars SET carMake = ?, carModel = ?, carYear = ?, carColor = ?, carDailyPrice = ?, locationId = ?
            WHERE carVin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdidi", $carMake, $carModel, $carYear, $carColor, $carDailyPrice, $locationId, $carVin);

    if ($stmt->execute()) {
        echo "Car updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<a href="update_car.php?carVin=1001">Update</a>
