<?php
require_once 'models/News.php';
require_once 'models/Category.php';

class NewsController {
    public function manage() {
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();  // Lấy tất cả tin tức
        require 'views/admin/news/index.php';   // Truyền dữ liệu vào view
    }    

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $image = $_FILES['image']['name'];

            move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/$image");

            $newsModel = new News();
            $newsModel->addNews($title, $content, $image, $category_id);

            header('Location: index.php?controller=news&action=manage');
        } else {
            $categoryModel = new Category();
            $categories = $categoryModel->getAllCategories();
            require 'views/admin/news/add.php';
        }
    }

    public function edit() {
        $newsModel = new News();
        $categoryModel = new Category();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $image = $_FILES['image']['name'] ?? null;

            if ($image) {
                move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/$image");
            }

            $newsModel->updateNews($id, $title, $content, $image, $category_id);
            header('Location: index.php?controller=news&action=manage');
        } else {
            $id = $_GET['id'];
            $news = $newsModel->getNewsById($id);
            $categories = $categoryModel->getAllCategories();
            require 'views/admin/news/edit.php';
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $newsModel = new News();
        $newsModel->deleteNews($id);
        header('Location: index.php?controller=news&action=manage');
    }
}
