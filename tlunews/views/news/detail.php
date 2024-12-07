<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $news['title'] ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1><?= $news['title'] ?></h1>
    <p><strong>Danh mục:</strong> <?= $news['category_name'] ?></p>
    <p><strong>Ngày đăng:</strong> <?= $news['created_at'] ?></p>
    <p><?= $news['content'] ?></p>
</body>
</html>
