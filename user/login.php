<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'login_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo "Login successful. Welcome, " . $user['name'];
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }
}

$conn->close();
?>
