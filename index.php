<?php
require_once('functions.php');

$obj = new data();

$result = $obj->index();
?>
<!doctype html>
<html>
	<head>
		<title>Task</title>
	</head>
    <style>
        div.gallery {
            margin: 13px;
            width: 220px;
            height: 220px;
        }
        div.gallery img {
            width:100%;
         
        }

        div.desc {
        text-align: center;
        }
    </style>
	<body>
		<table width="960px" align="center">
			<tr height="150px" valign="top">
				<td colspan="2">
					<h1 align="center">Portfolio</h1>
				</td>
			</tr>
			<tr height="450px" valign="top">
				<td width="15%">
					<h4 align="center">Categories</h4>
					<ol style="list-style:none; " >
						<li><a href="list.php">Full list</a></li>
						<li><a href="add.php">add data</a></li>
						<li><a href="">Third</a></li>
					</ol>
				</td>
				<td>
                    <ol style="list-style:none; ">
                    <?php
                        $index=1;
                        if($result){
                        foreach($result as $rs){
                        ?>
                        <li style="float:left;">
                        <div class="gallery">
                            <img src="<?php echo $rs['image']; ?>" >
                            <a style="padding-left: 80px;" href=""><?php echo $rs['name']; ?></a>
                            <div class="desc">Add a description </div>
                        </div>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ol>
				</td>
			</tr>
		</table>
	</body>
</html>