<?php
require_once('functions.php');

$obj = new data();

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

if(isset($_POST['update_data'])){
    $obj->update('data',$_POST,$_FILES,$id);
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
    <?php 
    
        $result = $obj->edit('data',$id);  
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
			
    ?>
    <form method="POST" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input type="text" name="name" value="<?php echo $row['name'] ?>">
            <label for="">email</label>
            <input type="text" name="email" value="<?php echo $row['email'] ?>">
            <label for="">Image</label>
            <input type="file" name="image" value="<?php echo $row['image'] ?>">
            <input type="hidden"  name="oldimage" value="<?php echo $row['image']; ?>">
            <label for="">Date</label>
            <input type="date" name="dob" value="<?php echo $row['dob'] ?>">
            <button type="submit" name="update_data">Submit</button>
        </div>
    </form>
    <?php
         } 
        }  
    ?>
</body>
</html>