<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "my_app";

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inserting Data
/*$sql = "INSERT INTO users (email, password, status)
VALUES ('test@gmail.com', '456', '1')";

$res = $conn->query($sql);
if ($res === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();*/

// Accessing DB data
$sql = "SELECT id, email, password, status FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Email: " . $row["email"] . " " . $row["password"] . " " . $row["status"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

// Updating DB data
/*$sql = "UPDATE users SET email='ehrekramulrifat@gmail.com' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
   $conn->close(); 
*/
?>