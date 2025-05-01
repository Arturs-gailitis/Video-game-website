<?php
require_once 'Database.php';

class Service {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Create a new service with image upload
    public function create($title, $desc, $image) {
        // Define upload directory and unique filename
        $uploadDir = 'images/services/';
        $fileName = basename($image['name']);
        $targetPath = $uploadDir . $fileName;
        
        // Move uploaded file
        if (move_uploaded_file($image['tmp_name'], $targetPath)) {
            $stmt = $this->db->prepare("INSERT INTO services (title, description, image) VALUES (:title, :desc, :image)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':desc', $desc);
            $stmt->bindParam(':image', $fileName);
            return $stmt->execute();
        }
        return false;
    }

    // Read all services (unchanged)
    public function readAll() {
        $stmt = $this->db->query("SELECT * FROM services");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update a service (with optional image update)
    public function update($id, $title, $desc, $image = null) {
        if ($image) {
            // Handle new image upload
            $uploadDir = 'images/services/';
            $fileName = uniqid() . '_' . basename($image['name']);
            $targetPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($image['tmp_name'], $targetPath)) {
                // First get old image to delete it
                $oldImage = $this->getServiceById($id)['image'];
                if ($oldImage && file_exists($uploadDir . $oldImage)) {
                    unlink($uploadDir . $oldImage);
                }
                
                // Update with new image
                $stmt = $this->db->prepare("UPDATE services SET title = :title, description = :desc, image = :image WHERE id = :id");
                $stmt->bindParam(':image', $fileName);
            } else {
                return false;
            }
        } else {
            // Update without changing image
            $stmt = $this->db->prepare("UPDATE services SET title = :title, description = :desc WHERE id = :id");
        }
        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete a service (with image cleanup)
    public function delete($id) {
        // First get the image to delete it
        $service = $this->getServiceById($id);
        if ($service && $service['image']) {
            $imagePath = 'images/services/' . $service['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        // Then delete the record
        $stmt = $this->db->prepare("DELETE FROM services WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Get single service by ID
    public function getServiceById($id) {
        $stmt = $this->db->prepare("SELECT * FROM services WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>