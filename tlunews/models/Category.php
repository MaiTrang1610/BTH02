<?php
require_once 'config/Database.php';

class Category {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Lấy danh sách tất cả danh mục
    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh mục theo ID
    public function getCategoryById($id) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm danh mục mới
    public function addCategory($name) {
        $sql = "INSERT INTO categories (name) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$name]);
    }

    // Cập nhật danh mục
    public function updateCategory($id, $name) {
        $sql = "UPDATE categories SET name = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$name, $id]);
    }

    // Xóa danh mục
    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }
}
