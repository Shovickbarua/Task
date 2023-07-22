<?php
require_once('functions.php');
$obj = new data();

if(isset($_GET['id'])){
    $id =$_GET['id'];
    $obj->delete($id);
}

$result = $obj->index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1px">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
            $index=1;
            if($result){
            foreach($result as $rs){
            ?>
            <tr>
                <td><?php echo $index++; ?></td>
                <td><?php echo $rs['name']; ?></td>
                <td><?php echo $rs['email']; ?></td>
                <td><img src="<?php echo $rs['image']; ?>" style="width:100px;height:110px;"></td>
                <td><?php echo $rs['dob']; ?></td>
                <td>
                <a title="Edit" href="edit.php?id=<?php echo $rs['id']; ?>" >edit</a>
                <a title="Delete" href="list.php?id=<?php echo $rs['id']; ?>" >delete</a>
                </a>
                </td>
            </tr>
            <?php
                }
            }
            ?> 

    </table>
</body>
</html>