
<?php
//buat folder di tempat dimana file ini disimpan, nama folder harus sama dg $target_dir, tidak harus uploads yg penting sama
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// IF yg ini untuk mengecek apakah dia file image atau bukan, jika ingin bukan file image silahkan di hapus IF ini
if(isset($_POST["submit"])) {
    $check = getdocumentsize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// IF ini untuk mengecek apakah sudah ada file yg bernama sama dalam folder / yg sudah pernah d uploads
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// IF ini digunakan untuk mengecek ukuran file, apabila lebih dari yg ditentukan maka tidak akan di upload
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// IF ini untuk mengijinkan file apa saja yg dibolehkan untuk di upload
// Misal ingin menambahkan file doc, isi di bagian kondisi if dengan $imageFileType != "doc"
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "doc") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    $uploadOk = 1;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
