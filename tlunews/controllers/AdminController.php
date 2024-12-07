<?php
require_once 'models/User.php';

class AdminController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->login($username, $password);

            if ($user && $user['role'] == 1) {
                session_start();
                $_SESSION['admin'] = $user;
                header('Location: index.php?controller=news&action=manage');
            } else {
                $error = "Sai tài khoản hoặc mật khẩu!";
            }
        }
        require 'views/admin/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=admin&action=login');
    }
}

