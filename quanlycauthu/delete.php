<?php
    //Kết nối databse
    include 'connect.php';
    
    //get id tren url
    $id = $_GET['ID'];
    
    //Viết câu SQL lấy tất cả dữ liệu trong bảng players
    $sql = "DELETE FROM `CAUTHU` WHERE `id`='".$id."'";
    
    // Chạy câu SQL
    if ($result = $con->query($sql)) {
        echo "<h1>Xóa cầu thủ thành công Click vào <a href='list.php'>đây</a> để về trang danh sách</h1>";
    }else{
        echo "<h1>Có lỗi xảy ra Click vào <a href='list.php'>đây</a> để về trang danh sách</h1>";
    }

?>


