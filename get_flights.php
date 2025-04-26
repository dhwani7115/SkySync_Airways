<?php
// DB connection
$conn = new mysqli('localhost', 'root', 'dhwani07', 'airline_reservation');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch flights
$sql = "SELECT * FROM flights";
$result = $conn->query($sql);

$flights = [];

while ($row = $result->fetch_assoc()) {
    $flights[] = $row;
}

echo json_encode($flights);
?>