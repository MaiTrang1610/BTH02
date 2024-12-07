<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Tin Tức</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <img src="assets/images/logo.png" alt="Logo Website">
            </div>
            <div class="site-name">
                <h1>Website Tin Tức</h1>
                <p>Trang tin tức hàng đầu</p>
            </div>
        </div>
            
        <nav class="navbar">
            <div class="container">
                <ul class="nav-menu">
                    <li><a href="#">Chính trị</a></li>
                    <li><a href="#">Kinh tế</a></li>
                    <li><a href="#">Thể thao</a></li>
                    <li><a href="#">Giải trí</a></li>
                    <li><a href="#">Pháp luật</a></li>
                    <li><a href="#">Du lịch</a></li>
                    <li><a href="views/admin/login.php">Đăng nhập</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Banner -->
    <section class="banner">
        <div class="container">
            <img src="assets/images/banner.jpg" alt="Banner">
        </div>
    </section>


    <!-- Content -->
    <?php
session_start();
require_once 'controllers/HomeController.php';
require_once 'controllers/NewsController.php';
require_once 'controllers/AdminController.php';

// Lấy giá trị controller và action từ URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Điều hướng đến controller và action tương ứng
switch ($controller) {
    case 'home':
        $homeController = new HomeController();
        if ($action === 'index') {
            $homeController->index();
        } elseif ($action === 'detail') {
            $homeController->detail();
        }
        break;

    case 'news':
        $newsController = new NewsController();
        if ($action === 'manage') {
            $newsController->manage();
        } elseif ($action === 'add') {
            $newsController->add();
        } elseif ($action === 'edit') {
            $newsController->edit();
        } elseif ($action === 'delete') {
            $newsController->delete();
        }
        break;

    case 'admin':
        $adminController = new AdminController();
        if ($action === 'login') {
            $adminController->login();
        } elseif ($action === 'logout') {
            $adminController->logout();
        }
        break;

    default:
        echo "Controller không tồn tại!";
        break;
}

?>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Website Tin Tức. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>