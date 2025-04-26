<?php
include 'db.php';

$flight_id = $_POST['flight_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "INSERT INTO reservations (flight_id, name, email, phone) VALUES ('$flight_id', '$name', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Your flight has been successfully booked!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>