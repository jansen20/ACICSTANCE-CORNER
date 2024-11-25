<?php
require 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['full_name']) ? trim($_POST['full_name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    if ($name && $email && $password) {
        try {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            if ($stmt->rowCount() > 0) {
                echo json_encode(['success' => false, 'message' => 'Email already registered.']);
                exit;
            }

            // Insert new user
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash password
            $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (:name, :email, :password)");
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword
            ]);

            echo json_encode(['success' => true, 'message' => 'Account created successfully!']);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Please fill all fields.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
