<?php
session_start();

require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Prepare and execute SQL query
    $stmt = $conn->prepare('SELECT id, password_hash FROM users WHERE username = ?');
    if ($stmt) {
        $stmt->bind_param('s', $username); 
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Bind result variables
            $stmt->bind_result($id, $password_hash);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $password_hash)) {
                // Set session variables and redirect
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username; 
                header("Location: index.php"); // No need for the leading slash if in the same directory
                exit;
            } else {
                echo "<div class='alert alert-danger text-center'>Invalid credentials.</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>User not found.</div>";
        }
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger text-center'>Statement preparation failed!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Centering the form -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Login</h3>
            
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional but useful for interactivity) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
