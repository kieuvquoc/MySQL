<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form onSubmit="kiemtraForm()" method="POST">
        <label>ten cau thu</label>
        <input id="ten" type="text" name="ten_cau_thu">
        <p id="ten-error"></p>
        <label>tuoi</label>
        <input id="tuoi" type="number" name="tuoi">
        <p id="tuoi-error"></p>
        <label>quoc tich</label>
        <input id="quoc_tich" type="text" name="quoc_tich">
        <p id="quoc-tich-error"></p>
        <label>vi tri</label>
        <input id="vi_tri" type="text" name="vi_tri">
        <p id="vi-tri-error"></p>
        <label>luong</label>
        <input id="luong" type="number" name="luong">
        <p id="luong-error"></p>
        <button type="submit">them</button>
    </form>
</body>
<script>
    let ten=document.getElementById('ten');
    let ten_error=document.getElementById('ten-error');
    let tuoi=document.getElementById('tuoi');
    let tuoi_error=document.getElementById('tuoi-error');
    let quoc_tich=document.getElementById('quoc_tich');
    let quoc_tich_error=document.getElementById('quoc-tich-error');
    let vi_tri=document.getElementById('vi_tri');
    let vi_tri_error=document.getElementById('vi-tri-error');
    let luong=document.getElementById('luong');
    let luong_error=document.getElementById('luong-error');

    function kiemtraForm(){
        let kiemtra=true;

        ten_error.innerHTML = "";
        tuoi_error.innerHTML = "";
        quoc_tich_error.innerHTML = "";
        vi_tri_error.innerHTML = "";
        luong_error.innerHTML = "";

        if(ten.value==""){
            kiemtra=false;
            ten_error.innerHTML="ten khong duoc de trong";
        }
        if(tuoi.value==""){
            kiemtra=false;
            tuoi_error.innerHTML="tuoi khong duoc de trong";
        }
        if(quoc_tich.value==""){
            kiemtra=false;
            quoc_tich_error.innerHTML="quoc tich khong duoc de trong";
        }
        if(vi_tri.value==""){
            kiemtra=false;
            vi_tri_error.innerHTML="vi tri khong duoc de trong";
        }
        if(luong.value==""){
            kiemtra=false;
            luong_error.innerHTML="luong khong duoc de trong";
        }
        if(kiemtra==false){
            event.preventDefault();
        } 
    }
    document.querySelector('form').addEventListener('submit', kiemtraForm);

</script>
</html>

<?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql="INSERT INTO CAUTHU(TENCAUTHU, TUOI, QUOCTICH, VITRI, LUONG)
            VALUES(
                '".$_POST['ten_cau_thu']."',
                '".$_POST['tuoi']."',
                '".$_POST['quoc_tich']."',
                '".$_POST['vi_tri']."',
                '".$_POST['luong']."'
            );";

        if($result=$con->query($sql)){
            echo "Them cau thu thanh cong";
            echo $sql;
        }
        else {
            echo "Them cau thu that bai";
        }
    }
?>