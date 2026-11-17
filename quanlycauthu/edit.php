<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'connect.php';

        $ID =$_GET['ID'];

        $sql="SELECT * FROM CAUTHU WHERE ID='$ID'";

        $result=$con->query($sql);

        $data=[];

        if($result->num_rows>0){
            $data=$result->fetch_assoc();
        }
        
        $html='';
        if($data){
            $html .='
            <label>ID</label>
            <input type="text" name="ID" value="' . $data['ID'] . '" readonly>
            <label>ten cau thu</label>
            <input id="ten" type="text" name="ten_cau_thu" value="' . $data['TENCAUTHU'] . '">
            <p id="ten-error"></p>
            <label>tuoi</label>
            <input id="tuoi" type="number" name="tuoi" value="' . $data['TUOI'] . '">
            <p id="tuoi-error"></p>
            <label>quoc_tich</label>
            <input id="quoc_tich" type="text" name="quoc_tich" value="' . $data['QUOCTICH'] . '">
            <p id="quoc_tich-error"></p>
            <label>vi_tri</label>
            <input id="vi_tri" type="text" name="vi_tri" value="' . $data['VITRI'] . '">
            <p id="vi_tri-error"></p>
            <label>luong</label>
            <input id="luong" type="number" name="luong" value="' . $data['LUONG'] . '">
            <p id="luong-error"></p>
            ';
        }

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $sql_EDIT="UPDATE CAUTHU SET
                ID='".$_POST['ID']."',  
                TENCAUTHU='".$_POST['ten_cau_thu']."',
                TUOI='".$_POST['tuoi']."',
                QUOCTICH='".$_POST['quoc_tich']."',
                VITRI='".$_POST['vi_tri']."',
                LUONG='".$_POST['luong']."'
                WHERE ID='".$_POST['ID']."'";

            if($con->query($sql_EDIT)===TRUE){
            echo "<h1>Sửa cầu thủ thành công Click vào <a href='list.php'>đây</a> để về trang danh sách</h1>";
        }
        }
    ?>
    <form onSubmit="kiemtraform(event)" METHOD="POST">
        <?php echo $html; ?>
        <button type="submit">Lưu</button>
    </form>
</body>
<script>
    let ten=document.getElementById('ten');
    let ten_error=document.getElementById('ten-error');
    let tuoi=document.getElementById('tuoi');
    let tuoi_error=document.getElementById('tuoi-error');
    let quoc_tich=document.getElementById('quoc_tich');
    let quoc_tich_error=document.getElementById('quoc_tich-error');
    let vi_tri=document.getElementById('vi_tri');
    let vi_tri_error=document.getElementById('vi_tri-error');
    let luong=document.getElementById('luong');
    let luong_error=document.getElementById('luong-error');

    let ten_CO_SAN="<?php echo $data['TENCAUTHU']; ?>";
    let tuoi_CO_SAN="<?php echo $data['TUOI']; ?>";
    let quoc_tich_CO_SAN="<?php echo $data['QUOCTICH']; ?>";
    let vi_tri_CO_SAN="<?php echo $data['VITRI']; ?>";
    let luong_CO_SAN="<?php echo $data['LUONG']; ?>";

    function kiemtraform(e){
        let kiemtra=true;
        if(ten.value==""){
            ten_error.textContent="Vui lòng nhập tên cầu thủ";
            kiemtra=false;
        }else{
            ten_error.textContent="";
        }
        if(tuoi.value==""){
            tuoi_error.textContent="Vui lòng nhập tuổi cầu thủ";
            kiemtra=false;
        }else{
            tuoi_error.textContent="";
        }
        if(quoc_tich.value==""){
            quoc_tich_error.textContent="Vui lòng nhập quốc tịch cầu thủ";
            kiemtra=false;
        }else{
            quoc_tich_error.textContent="";
        }
        if(vi_tri.value==""){
            vi_tri_error.textContent="Vui lòng nhập vị trí cầu thủ";
            kiemtra=false;
        }else{
            vi_tri_error.textContent="";
        }
        if(luong.value==""){
            luong_error.textContent="Vui lòng nhập lương cầu thủ";
            kiemtra=false;
        }else{
            luong_error.textContent="";
        }

        if(!kiemtra){
            e.preventDefault();
        }
    }
</script>
</html>