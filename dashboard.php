<?php
require_once 'classes/Service.php';

$service = new Service();
$services = $service->readAll();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if ($service->delete($id)) {
        header("Location: dashboard.php?success=deleted");
        exit();
    } else {
        $error = "Failed to delete service";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Services Dashboard</h2>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">
                <?php 
                switch ($_GET['success']) {
                    case 'added': echo "Service added successfully!"; break;
                    case 'updated': echo "Service updated successfully!"; break;
                    case 'deleted': echo "Service deleted successfully!"; break;
                }
                ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <a href="add_service.php" class="btn btn-success mb-3">Add New Service</a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $s): ?>
                <tr>
                    <td><?= $s['id'] ?></td>
                    <td><?= htmlspecialchars($s['title']) ?></td>
                    <td><?= htmlspecialchars($s['description']) ?></td>
                    <td><?= htmlspecialchars($s['image']) ?></td>
                    <td>
                        <a href="edit_service.php?id=<?= $s['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="dashboard.php?delete=<?= $s['id'] ?>" class="btn btn-danger btn-sm" 
                           onclick="return confirm('Are you sure you want to delete this service?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>