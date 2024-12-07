<?php
require_once 'config/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Xác thực đăng nhập
    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách tất cả người dùng
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy thông tin người dùng theo ID
    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm người dùng mới
    public function addUser($username, $password, $role) {
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username, $password, $role]);
    }

    // Cập nhật người dùng
    public function updateUser($id, $username, $password, $role) {
        $sql = "UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username, $password, $role, $id]);
    }

    // Xóa người dùng
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }
}
