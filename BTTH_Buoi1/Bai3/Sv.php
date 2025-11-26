<?php
$filename = "65HTTT_Danh_sach_diem_danh.csv";

if (!file_exists($filename)) {
    die("Không tìm thấy file CSV!");
}

$file = fopen($filename, "r");

// Lấy dòng tiêu đề từ CSV
$header = fgetcsv($file);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đọc file CSV – Công nghệ Web</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 6px 10px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Danh sách tài khoản từ file CSV</h2>

<table>
    <thead>
        <tr>
            <?php
            // In tiêu đề bảng từ header CSV
            foreach ($header as $h) {
                echo "<th>" . htmlspecialchars($h) . "</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        // Đọc dữ liệu còn lại
        while (($row = fgetcsv($file)) !== false) {
            echo "<tr>";
            foreach ($row as $col) {
                echo "<td>" . htmlspecialchars($col) . "</td>";
            }
            echo "</tr>";
        }

        fclose($file);
        ?>
    </tbody>
</table>

</body>
</html>
