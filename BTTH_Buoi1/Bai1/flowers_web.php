<?php require "data.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Danh sách các loài hoa</title>
<style>
/* --- BỐ CỤC CHUNG VÀ CĂN GIỮA --- */
body { 
    font-family: Arial, sans-serif; 
    margin: 0; 
    background-color: #f8f8f8; 
}
h1 { 
    text-align: center; 
    padding: 20px 0;
}
a {
    margin: 15px;
    color: #007bff;
    text-decoration: none;
}

.container { 
    max-width: 800px; 
    margin: 20px auto; /* Canh giữa khối nội dung */
    padding: 0 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    background-color: #ffffff;
    /* KHÔNG dùng display: grid/flex, để các mục hoa xếp chồng lên nhau */
}
.flower {
    padding: 20px;
    text-align: left; 
}
.flower .name { 
    font-weight: bold; 
    font-size: 28px; 
    margin: 0 0 15px 0; 
    color: #333;
}
.flower p {
    line-height: 1.6;
    color: #555;
}

.flower img {
    width: 100%; 
    height: auto; 
    max-height: 500px; 
    object-fit: cover;
    border-radius: 6px;
    margin: 10px 0 20px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>
</head>
<body>

<div class="container">
<a href="admin.php">Vào trang quản trị</a>
<h1>🌸 Các Loại Hoa Tuyệt Đẹp – Xuân Hè 🌸</h1>
<?php foreach ($flowers as $f): ?>
    <div class="flower">
        <div class="name"><?= $f['name'] ?></div>
        <p><?= $f['desc'] ?></p>
        <img src="images/<?= $f['image'] ?>" alt="">
        
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
