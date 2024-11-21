<?php
include 'cs340_johnsa33.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerId = $_POST['customerId'];
    $carVin = $_POST['carVin'];
    $rentalStartDate = $_POST['rentalStartDate'];
    $rentalEndDate = $_POST['rentalEndDate'];
    $rentalCost = $_POST['rentalCost'];

    $sql = "INSERT INTO Rentals (customerId, carVin, rentalStartDate, rentalEndDate, rentalCost)
            VALUES ('$customerId', '$carVin', '$rentalStartDate', '$rentalEndDate', '$rentalCost')";

    if ($conn->query($sql) === TRUE) {
        echo "New rental added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
