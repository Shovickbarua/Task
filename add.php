<?php
require_once('functions.php');

$obj = new data();
if(isset($_POST['add_data'])){
    $obj->add($_POST,$_FILES);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input type="text" name="name">
            <label for="">email</label>
            <input type="text" name="email">
            <label for="">Image</label>
            <input type="file" name="image">
            <label for="">Date</label>
            <input type="date" name="date">
            <button type="submit" name="add_data">Submit</button>
        </div>
    </form>
</body>
</html>