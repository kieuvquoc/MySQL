<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include "connect.php";

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $thongbao="";

            $sql="SELECT * FROM user WHERE EMAIL ='".$_POST['email']."' AND PASSWORD='".md5($_POST['pass'])."'";

            $result=$con->query($sql);

            if($result&&$result->num_rows>0){
                $row=$result->fetch_assoc();

                $_SESSION["is_login"]=true;
                $_SESSION["user_id"]=$row['id'];
                $_SESSION["user_email"]=$row['email'];

                header("Location: account.php");
                exit();
            }
            else {
                $thongbao="sai emamil hoac mk";
            }

        }
    ?>
    <div class="login-form"><!--login form-->
        <?php if(!empty($thongbao)) { echo '<p class="error">'.$thongbao.'</p>'; } ?>
        <h2>Login to your account</h2>
        <form action="#" id="form" method="POST">
            <input type="email" name="email" id="email" placeholder="Email Address" />
            <p id="email_error"></p>
            <input type="password" name="pass" id="pass" placeholder="Password" />
            <p id="pass_error"></p>
            <span>
                <input type="checkbox" class="checkbox"> 
                Keep me signed in
            </span>
            <button type="submit" class="btn btn-default">Login</button>
        </form>
    </div>
</body>
<script>
    let form = document.getElementById("form");
    let pass = document.getElementById("pass");
    let email = document.getElementById("email");
    let pass_error = document.getElementById("pass_error");
    let email_error = document.getElementById("email_error");

    
    form.addEventListener("submit", (e) => {
        let kiemtra = true;

        if(pass.value == ""){
            pass_error.innerHTML = "Vui long nhap ten";
            kiemtra = false;
        } else {
            pass_error.innerHTML = "";
        }

        if(email.value == ""){
            email_error.innerHTML = "Vui long nhap email";
            kiemtra = false;
        } else {
            email_error.innerHTML = "";
        }

        if(!kiemtra){
            e.preventDefault(); 
        }
    });
</script>
</html>