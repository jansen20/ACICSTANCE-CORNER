<?php
// Database connection
$host = 'localhost';
$dbname = 'feedback';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle feedback form submission (AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] == 'application/json') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['action']) && $data['action'] === 'delete' && isset($data['id'])) {
        // Handle delete feedback
        $id = $data['id'];
        $stmt = $pdo->prepare("DELETE FROM feedback WHERE id = :id");
        $stmt->execute([':id' => $id]);
        echo json_encode(['success' => true, 'message' => 'Feedback deleted successfully']);
        exit;
    }

    // Handle new feedback submission
    $comment = $data['comment'];
    $rating = $data['rating'];

    if ($comment) {
        $stmt = $pdo->prepare("INSERT INTO feedback (rating, comment, submitted_at) VALUES (:rating, :comment, NOW())");
        $stmt->execute([':rating' => $rating, ':comment' => $comment]);

        $feedbackId = $pdo->lastInsertId();
        $submittedAt = date('Y-m-d H:i:s');

        echo json_encode([
            'success' => true,
            'id' => $feedbackId,
            'comment' => htmlspecialchars($comment),
            'rating' => $rating,
            'submitted_at' => $submittedAt,
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Comment is required.']);
    }
    exit;
}

// Fetch feedback data to display
$stmt = $pdo->query("SELECT * FROM feedback ORDER BY submitted_at DESC");
$feedbackList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; /* Light blue background */
        }
        .container {
            margin-top: 30px;
            background-color: #ffffff; /* White background for the content */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .header img {
            max-height: 60px;
            margin-right: 15px;
        }
        .header h2 {
            color: #007bff; /* Bootstrap primary color (blue) */
        }
        .table {
            background-color: #e6f2ff; /* Light blue background for table */
        }
        .btn-delete {
            color: white;
            background-color: #007bff; /* Bootstrap primary color (blue) */
            border: none;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .btn-delete:hover {
            background-color: #0056b3; /* Darker blue */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://github.com/user-attachments/assets/f8675999-d5e6-4f55-bd38-f01fab2e76d6" alt="Logo">
            <h2>Feedback List</h2>
        </div>

        <!-- Display feedback list -->
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Feedback</th>
                    <th>Rating</th>
                    <th>Submitted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="feedbackList">
                <?php foreach ($feedbackList as $item): ?>
                    <tr data-id="<?= $item['id'] ?>">
                        <td><?= htmlspecialchars($item['id']) ?></td>
                        <td><?= htmlspecialchars($item['comment']) ?></td>
                        <td><?= htmlspecialchars($item['rating']) ?></td>
                        <td><?= htmlspecialchars($item['submitted_at']) ?></td>
                        <td>
                            <button class="btn btn-delete">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const feedbackList = document.getElementById('feedbackList');

            // Handle delete button click
            feedbackList.addEventListener('click', function (event) {
                if (event.target.classList.contains('btn-delete')) {
                    const row = event.target.closest('tr');
                    const feedbackId = row.getAttribute('data-id');

                    if (confirm('Are you sure you want to delete this feedback?')) {
                        // Send AJAX request to delete feedback
                        fetch('', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                action: 'delete',
                                id: feedbackId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Remove the row from the table
                                row.remove();
                            } else {
                                alert('Error deleting feedback.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
                }
            });
        });
    </script>
</body>
</html>
