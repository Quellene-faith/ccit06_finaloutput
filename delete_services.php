<?php
session_start();
include 'db.php'; // Include the database connection

// Check if 'id' is set and is a valid integer
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // First, fetch the image name of the service to delete it from the server
    $result = $conn->query("SELECT image FROM services WHERE id = $id");
    if ($result->num_rows > 0) {
        $service = $result->fetch_assoc();
        $imageName = $service['image'];

        // Delete the service record from the database
        $query = "DELETE FROM services WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // After successful deletion, delete the image file from the uploads folder
            if (file_exists("uploads/" . $imageName)) {
                unlink("uploads/" . $imageName);
            }
            // Redirect back to the services page with a success message
            header("Location: services.php?status=deleted");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
