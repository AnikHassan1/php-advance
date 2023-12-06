<?php
if (isset($_POST['submit'])) {
    $filename = $_FILES['myfiles']['name'];
    //  print_r($filename);
    $tmpName = $_FILES['myfiles']['tmp_name'];
    //folder Create
    $folder = "uploads" . $filename;
    //variable
    $imgDone = 1;
    //path information
    $path = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    //file size
    $imgSize = $_FILES['myfiles']['size'];
    //check img real or fake
    $chechImg = getimagesize($tmpName);
    if ($chechImg !== false) {
        echo "this is an -" . $chechImg['mime'];
        $imgDone = 1;
    } else {
        $imgDone = 0;
    }
    if (file_exists($folder)) {
        echo "file already exist";
        $imgDone = 0;
    }
    if ($imgSize > 10000000) {
        echo "img size are large";
        $imgDone = 0;
    }
    if ($path != "png" && $path != "jpg") {
        echo "images send png or jpg";
        $imgDone = 0;
    }
    if ($imgDone == 0) {
        echo "sorry your file not upload";
    } elseif (move_uploaded_file($tmpName, $folder)) {
        echo "file upload Done";
    }else{
        echo "file not upload ";
    }
}
?>
<form action="fileUpload.php" method="POSt" enctype="multipart/form-data">
    Image: <input type="file" name="myfiles"><br><br>
    <input type="submit" value="submit" name="submit">
</form>