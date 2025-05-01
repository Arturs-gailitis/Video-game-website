<?php
require_once 'classes/Service.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $image = $_FILES['image'];
    
    // Validate the image
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image['type'], $allowedTypes)) {
        $error = "Only JPG, PNG, and GIF images are allowed.";
    } elseif ($image['size'] > 2000000) { // 2MB limit
        $error = "Image size must be less than 2MB.";
    } else {
        $service = new Service();
        if ($service->create($title, $desc, $image)) {
            header("Location: dashboard.php?success=added");
            exit();
        } else {
            $error = "Failed to add service";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Add New Service</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Service Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Service</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>