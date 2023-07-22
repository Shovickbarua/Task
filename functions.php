<?php
require_once('connection.php');
class data extends db{
    
    public function index(){
        $sql= "select * from data order by id desc";
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
    public function add(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dob = date('Y-m-d',strtotime($_POST['dob']));
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $directory = "images/";
        $image = $directory.$imageName;
        move_uploaded_file($imageTmp,$image);
        $sql = "insert into data (name,email,dob,image) values('$name','$email','$dob','$image')";
        $result = mysqli_query($this->connection, $sql);
			if ($result) {
				header("location:list.php");
			}

    }
    public function edit($id){
        $sql = "select * from  data where id = '$id'";
        $result = mysqli_query($this->connection, $sql);
		return $result;
		}

    public function update($id){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dob = date('Y-m-d',strtotime($_POST['dob']));
        $sql = "update data set name='$name',email='$email',dob='$dob' where id='$id'";
        $result = mysqli_query($this->connection, $sql);
			if ($result) {
				header("location:list.php");
			}

    }
    public function delete($id){
        $sql = "delete from data where id ='$id'";
        $result = mysqli_query($this->connection, $sql);
			if ($result) {
				header("location:list.php");
			}

    }
  
}
?>