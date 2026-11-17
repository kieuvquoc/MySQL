<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="banhang_baovic";

    $con=new mysqli($servername,$username,$password,$database);

    if($con->connect_error){
        die("Loi ket noi: ".$con->connect_error);
    }
    else {
        echo "ket noi thanh cong";
    }
?>