<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
</head>
<body>
    <h1>Thêm Tin Tức</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Tiêu đề</label>
        <input type="text" name="title" required><br>
        <label>Nội dung</label>
        <textarea name="content" required></textarea><br>
        <label>Hình ảnh</label>
        <input type="file" name="image" required><br>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
