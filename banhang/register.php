<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "connect.php";

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $avatar = "";

            if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
                $file_name = $_FILES['file']['name'];
                $file_tmp = $_FILES['file']['tmp_name'];
                
                // Đường dẫn thư mục uploads (nằm cùng cấp với file php này)
                $target_dir = "uploads/";
                
                // Nếu chưa có thư mục uploads thì tự động tạo
                if(!is_dir($target_dir)){
                    mkdir($target_dir, 0777, true);
                }
                
                $target_file = $target_dir . basename($file_name);
                
                // Di chuyển file từ thư mục tạm vào thư mục uploads
                if(move_uploaded_file($file_tmp, $target_file)){
                    $avatar = $file_name; // Lấy tên file để insert vào CSDL
                }
            }


            $sql="INSERT INTO user(email,password,name,avatar) 
            VALUES('".$_POST['email']."','".md5($_POST['password'])."','".$_POST['name']."','".$avatar."')";

            if($result=$con->query($sql)){
            echo "dang ky thanh cong email" .$_POST['email'];
        } else {
            echo "dang ky that bai: " . $con->error;
        }
        }
    ?>
    <div class="signup-form"><!--sign up form-->
        <h2>New User Signup!</h2>
        <form id="form" action="#" method="POST" enctype="multipart/form-data">
            <input type="text" id="id" placeholder="Name">
            <p id="id_error"></p>
            <input type="email" id="email" placeholder="Email Address"/>
            <p id="email_error"></p>
            <input type="password" id="password" placeholder="Password"/>
            <p id="password_error"></p>
            <input type="file" id="file" placeholder="Choose your avatar"/>
            <p id="file_error"></p>
            <button type="submit" class="btn btn-default">Signup</button>
        </form>
    </div>
</body>
<script>
    let name = document.getElementById("name");
    let name_error=document.getElementById("name_error");
    let email = document.getElementById("email");
    let email_error=document.getElementById("email_error");
    let password = document.getElementById("password");
    let password_error=document.getElementById("password_error");
    let file = document.getElementById("file");
    let file_error=document.getElementById("file_error");

    let form=document.getElementById("form");
    form.addEventListener("submit", (e)=>{
        e.preventDefault();
        let kiemtra=true;

        if(name.value==""||name.value=="Name"){
            name_error.innerHTML = "Vui long nhap ten";
            kiemtra=false;
        }
        else name_error.innerHTML = "";

        if(email.value==""||email.value=="Email Address"){
            email_error.innerHTML = "Vui long nhap email";
            kiemtra=false;
        }
        else email_error.innerHTML = "";

        if(password.value==""||password.value=="Password"){
            password_error.innerHTML = "Vui long nhap mat khau";
            kiemtra=false;
        }
        else password_error.innerHTML = "";

        if(file.value==""||file.value=="Choose your avatar"){
            file_error.innerHTML = "Vui long chon anh dai dien";
            kiemtra=false;
        }
        else if(file.value){
            let tachduoi=file.value.split(".");
            let duoi =["jpg","png","jpeg"];
            if(!tachduoi.includes(duoi)){
                file_error.innerHTML = "anh sai dinh dang";
                kiemtra=false;
            }
            if(file.size>1024*1024){
                file_error.innerHTML = "Kich thuoc anh vuot qua 1MB";
                kiemtra=false;
            }
        }
        else file_error.innerHTML = "";

        if(!kiemtra){
            e.preventDefault(); 
        }
    })
</script>
</html>