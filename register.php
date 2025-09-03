<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "book_recommendation";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $uname, $email, $pwd);
    if ($stmt->execute()) {
        echo "Registration successful.";
    } else {
        echo "Registration failed.";
    }

    $stmt->close();
}
$conn->close();
?>
