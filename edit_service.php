<?php
require_once 'classes/Service.php';

$service = new Service();

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];
$currentService = $service->getServiceById($id);

if (!$currentService) {
    header("Location: dashboard.php?error=notfound");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $image = $_FILES['image']['size'] > 0 ? $_FILES['image'] : null;
    
    if ($service->update($id, $title, $desc, $image)) {
        header("Location: dashboard.php?success=updated");
        exit();
    } else {
        $error = "Failed to update service";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Service</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" 
                       value="<?= htmlspecialchars($currentService['title']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" 
                          rows="3" required><?= htmlspecialchars($currentService['description']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Service Image (Leave empty to keep current)</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <?php if ($currentService['image']): ?>
                    <div class="mt-2">
                        <img src="uploads/services/<?= htmlspecialchars($currentService['image']) ?>" 
                             alt="Current Image" style="max-height: 100px;">
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Update Service</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>