<?php
require_once('connection.php');
class data extends db{
    
    public function index($table){
        $sql= "select * from $table order by id desc";
        $result = mysqli_query($this->connection, $sql);
		$arr = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
				$arr[] = $row;
            }
			return $arr;
        }else{
			return 0;
		}
    }
    public function add($table,$data,$files){
        $name = $data['name'];
        $email = $data['email'];
        $dob = date('Y-m-d',strtotime($data['dob']));
        $imageName = $files['image']['name'];
        $imageTmp = $files['image']['tmp_name'];
        $directory = "images/";
        $image = $directory.$imageName;
        move_uploaded_file($imageTmp,$image);
        $sql = "insert into $table (name,email,dob,image) values('$name','$email','$dob','$image')";
        $result = mysqli_query($this->connection, $sql);
			if ($result) {
				header("location:list.php");
			}

    }
    public function edit($table,$id){
        $sql = "select * from  $table where id = '$id' limit 1";
        $result = mysqli_query($this->connection, $sql);
		return $result;
       
		}

    public function update($table,$data,$files,$id){
        $name = $data['name'];
        $email = $data['email'];
        $dob = date('Y-m-d',strtotime($data['dob']));
        $imageName = $files['image']['name'];
        $imageTmp = $files['image']['tmp_name'];
        $directory = "images/";
        $image = $directory.$imageName;
        unlink($data['oldimage']);
        move_uploaded_file($imageTmp,$image);
        $sql = "update $table set name='$name',email='$email',dob='$dob',image='$image' where id='$id'";
        $result = mysqli_query($this->connection, $sql);
			if ($result) {
				header("location:list.php");
			}

    }
    public function delete($table,$id){
        $sql = "delete from $table where id ='$id'";
        $result = mysqli_query($this->connection, $sql);
        //unlink($image_url);
			if ($result) {
				header("location:list.php");
			}
           
        

    }
  
}
?>