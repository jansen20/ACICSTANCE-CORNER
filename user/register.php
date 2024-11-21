<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['reg-name']);
    $email = mysqli_real_escape_string($conn, $_POST['reg-email']);
    $password = password_hash($_POST['reg-password'], PASSWORD_BCRYPT); // Secure password hashing

    // Check if email already exists
    $checkEmail = "SELECT email FROM users WHERE email=?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email already registered";
    } else {
        // Insert the new user into the database
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
