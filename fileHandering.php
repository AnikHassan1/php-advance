<?php
#readfile() folder a txt file read korar jnno
#fopen file add kora zai
// $file= fopen("info.txt","w") or die('unable to file open');

// $txt ='PHP Video';

// fwrite($file,$txt);
// #echo fread($file,filesize('info.txt'));
// fclose($file);

// move_uploaded_file()

if (isset($_POST['submit'])) {
    $filename = $_FILES['myFile']['name'];
    $temp = $_FILES['myFile']['tmp_name'];
    $size = $_FILES['myFile']['size'];
    $upload = 'images/' . $filename;
    $uploadok = 1;
    $imagefiletype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $check = getimagesize($temp);
    #check right images
    if ($check !== false) {
        echo "file is an -" . $check['mime'];
        $uploadok = 1;
    } else {
        $uploadok = 0;
    }
    #file duplicate check
    if (file_exists($upload)) {
        echo "file already exists";
        $uploadok = 0;
    }
    #file size 
    if ($size > 10000000) {
        echo "file is to large";
        $uploadok = 0;
    }
    #chech jpg
    if ($imagefiletype != "png" && $imagefiletype != "jpg") {
        echo "file only allowed jpg or png";
        $uploadok = 0;
    }
    #uploadok check
    if ($uploadok == 0) {
        echo "sorry,file was not upload";
    } elseif (move_uploaded_file($temp,  $upload)) {
        echo "file uploaded";
    }else{
        echo " not uploaded";
    }
}

?>
<form action="fileHandering.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="myFile"><br><br>
    <input type="submit" name="submit" value="upload">
</form>