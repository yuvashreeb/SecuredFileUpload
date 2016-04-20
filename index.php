<?php
if (isset($_FILES['image'])) {
    $error = array();
    $allowedext = array('jpg', 'jpeg', 'png', 'gif');

    $filename = $_FILES['image']['name'];
    @ $fileext = strtolower(end(explode('.', $filename))); //end takes last element of array

    $filesize = $_FILES['image']['size'];
    $filetmp = $_FILES['image']['tmp_name'];

    if (in_array($fileext, $allowedext) === FALSE) {
        $error[] = 'Extension not allowed';
    }
    if ($filesize > 2097152) {
        $error[] = 'File size must be under 2mb';
    }
    if (empty($error)) {
        if (move_uploaded_file($filetmp, 'images/' . $filename)) {
            echo 'File Uploaded succesfully';
        }
    } else {
        foreach ($error as $errors) {
            echo $error . '<br>';
        }
    }
    //print_r($error);
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <p>
        <input type="file" name="image"/>
        <input type="submit" value="upload"/>
    </p>
</form>