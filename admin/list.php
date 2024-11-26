<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <img src="https://raw.githubusercontent.com/liz173/ACICSTANCE-CORNER/refs/heads/liz173-patch-1/acicstance%20logo.png" alt="Logo" style="width: 100px; margin-bottom: 20px;">
        
        <div class="container">
            <h2 class="text-center">Registered Users</h2>

            <?php
            // Include database connection
            include 'db.php';

            // Handle delete request
            if (isset($_GET['delete_id'])) {
                $delete_id = $_GET['delete_id'];
                $delete_sql = $conn->prepare("DELETE FROM users WHERE id = :id");
                $delete_sql->execute([':id' => $delete_id]);

                if ($delete_sql->rowCount() > 0) {
                    echo "<p class='alert alert-success text-center'>User deleted successfully.</p>";
                } else {
                    echo "<p class='alert alert-danger text-center'>Error deleting user or user not found.</p>";
                }
            }

            // Handle update request
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_id'])) {
                $update_id = $_POST['update_id'];

                // Validate 'name' and 'email' fields
                if (isset($_POST['full_name']) && isset($_POST['email'])) {
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];

                    $update_sql = $conn->prepare("UPDATE users SET full_name = :full_name, email = :email WHERE id = :id");
                    $update_sql->execute([
                        ':full_name' => $full_name,
                        ':email' => $email,
                        ':id' => $update_id
                    ]);

                    if ($update_sql->rowCount() > 0) {
                        echo "<p class='alert alert-success text-center'>User updated successfully.</p>";
                    } else {
                        echo "<p class='alert alert-danger text-center'>Error updating user or no changes made.</p>";
                    }
                } else {
                    echo "<p class='alert alert-danger text-center'>Please fill in all required fields.</p>";
                }
            }


            // Fetch users
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->rowCount() > 0) {
                echo "<table class='table table-striped table-bordered text-center'>";
                echo "<thead>";
                echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Actions</th></tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>";
                    echo "<a href='list.php?delete_id=" . htmlspecialchars($row['id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a> ";
                    echo "<button class='btn btn-primary btn-sm' onclick='editUser(" . htmlspecialchars($row['id']) . ", \"" . htmlspecialchars($row['full_name'], ENT_QUOTES) . "\", \"" . htmlspecialchars($row['email'], ENT_QUOTES) . "\")'>Edit</button>";
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p class='text-center'>No users found.</p>";
            }
            ?>
            
            <!-- Hidden edit form -->
            <div id="editForm" style="display: none;" class="mt-4">
                <h3>Edit User</h3>
                <form method="post" action="list.php">
                    <input type="hidden" full_name="update_id" id="update_id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" full_name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" full_name="email" id="email" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" onclick="closeEditForm()">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function editUser(id, full_name, email) {
            document.getElementById('editForm').style.display = 'block';
            document.getElementById('update_id').value = id;
            document.getElementById('full_name').value = full_name;
            document.getElementById('email').value = email;
            window.scrollTo(0, document.getElementById('editForm').offsetTop);
        }

        function closeEditForm() {
            document.getElementById('editForm').style.display = 'none';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
