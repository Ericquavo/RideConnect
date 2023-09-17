<?php
// Establish a database connection (adjust these settings as needed)
$dbServer = 'localhost';
$dbUsername = 'your_db_username';
$dbPassword = 'your_db_password';
$dbName = 'your_db_name';

$conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $location = $_POST['location'];

    // SQL query to insert user data into the database
    $sql = "INSERT INTO users (name, email, location) VALUES ('$name', '$email', '$location')";

    if (mysqli_query($conn, $sql)) {
        echo "Profile saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
