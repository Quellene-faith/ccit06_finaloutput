<?php
session_start();
include 'db.php'; // Include the database connection

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the service data to populate the form
    $query = "SELECT * FROM services WHERE id = $id";
    $result = $conn->query($query);
    $service = $result->fetch_assoc();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Update service data
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        // Handle the file upload (optional, if user wants to change the image)
        $imageName = $service['image'];  // Keep the existing image if not updated

        if (!empty($_FILES["image"]["name"])) {
            $targetDir = "uploads/";
            $imageName = basename($_FILES["image"]["name"]);
            $targetFile = $targetDir . $imageName;
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        }

        // Update query
        $query = "UPDATE services SET title = ?, description = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $title, $description, $imageName, $id);
        
        if ($stmt->execute()) {
            header("Location: services.php?status=updated");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <!-- Add Bootstrap 5.2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Service</h2>

        <!-- Display Success or Error Messages -->
        <?php if (isset($_GET['status']) && $_GET['status'] === 'updated'): ?>
            <div class="alert alert-success">Service updated successfully!</div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Service Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($service['title']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" required><?php echo htmlspecialchars($service['description']); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image (Optional)</label>
                <input type="file" class="form-control" name="image">
            </div>

            <!-- Display current image if exists -->
            <?php if (!empty($service['image'])): ?>
                <div class="mb-3">
                    <p>Current Image:</p>
                    <img src="uploads/<?php echo htmlspecialchars($service['image']); ?>" alt="Service Image" class="img-fluid" width="200">
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="services.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <!-- Add Bootstrap 5.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</body>
</html>

