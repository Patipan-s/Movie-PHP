<?php
//กำหนดตำแหน่งการอัพโหลด
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// เช็คไฟล์ว่าเป็นไฟล์รูปไหม
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
// เช็คไฟล์ว่ามีไฟล์นี้อยู่เเล้วไหม
if (file_exists($target_file)) {
    $uploadOk = 0;
}
// เช็คขนาดไฟล์
if ($_FILES["imageUpload"]["size"] > 1000000) {
    
    $uploadOk = 0;
}
// กำหนดนามสกุลไฟล์ที่สามารถอัพโหลดได้
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}
// เช็คว่าอัพโหลดสำเร็จไหม
if ($uploadOk == 0) {
// ถ้าทุกอย่างเรียบร้อยให้อัพโหลด
} else {
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        $uploadOk = 1;

    } else {
        $uploadOk = 0;
    }
}
?>