<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "trip"; // Replace with your actual database name

$conn = mysqli_connect($server, $username, $password);

if (!$conn) {
    die("Connection to the database has failed due to: " . mysqli_connect_error());
} else {
    echo "Database is connected";
}

// Select the database
if (mysqli_select_db($conn, $database)) {
    echo "Selected database: " . $database . "<br>";
} else {
    die("Database selection failed: " . mysqli_error($conn));
}

$name = $_POST["name"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$dosc = $_POST["dosc"];

$sql = "INSERT INTO `data` (`name`, `gender`, `age`, `email`, `phone`, `dosc`, `dt`) 
        VALUES ('$name', '$gender', '$age', '$email', '$phone', '$dosc', current_timestamp())";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
