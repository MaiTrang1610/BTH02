<?php
require_once 'config/Database.php';

class News {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAllNews() {
        $sql = "SELECT news.*, categories.name AS category_name 
                FROM news 
                JOIN categories ON news.category_id = categories.id";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($id) {
        $sql = "SELECT news.*, categories.name AS category_name 
                FROM news 
                JOIN categories ON news.category_id = categories.id 
                WHERE news.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addNews($title, $content, $image, $category_id) {
        $sql = "INSERT INTO news (title, content, image, created_at, category_id) 
                VALUES (?, ?, ?, NOW(), ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$title, $content, $image, $category_id]);
    }

    public function updateNews($id, $title, $content, $image, $category_id) {
        $sql = "UPDATE news SET title = ?, content = ?, image = ?, category_id = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$title, $content, $image, $category_id, $id]);
    }

    public function deleteNews($id) {
        $sql = "DELETE FROM news WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }
}
