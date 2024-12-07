<?php
require_once 'models/News.php';

class HomeController {
    public function index() {
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();
        require 'views/home/index.php';
    }

    public function detail() {
        $id = $_GET['id'] ?? 0;
        $newsModel = new News();
        $news = $newsModel->getNewsById($id);
        require 'views/news/detail.php';
    }
}
