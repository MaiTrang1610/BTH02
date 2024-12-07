<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tin Tức</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Danh sách Tin Tức</h1>
    <div class="news-list">
        <?php foreach ($newsList as $news): ?>
            <div class="news-item">
                <h2><a href="index.php?controller=home&action=detail&id=<?= $news['id'] ?>"><?= $news['title'] ?></a></h2>
                <p><strong>Danh mục:</strong> <?= $news['category_name'] ?></p>
                <p><?= substr($news['content'], 0, 100) ?>...</p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
