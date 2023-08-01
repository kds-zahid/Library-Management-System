<?php

include_once 'database.php';
//session_start();
//session_start() method already called in admin/index.php

class login{
    public $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function chechAdminInfo($data) {
        $email = $data['email'];
        $password = $data['password'];
        $sql = "SELECT * FROM user WHERE user_email='$email' AND user_password='$password'";
        $result = mysqli_query($this->db->link, $sql);
        $row = mysqli_fetch_assoc($result);
		
        if($row){
			if($row['activation_status']==0){				
				header("location:index.php?message=Deactivated account! <br /> you can't login now!");
			}else{
            $_SESSION['userName']=$row['user_name'];        
            $_SESSION['userId']=$row['user_id'];
            $_SESSION['userLevel']=$row['user_level'];
            $_SESSION['userImage']=$row['user_image'];
            header("location:dashboard.php");
			}
        }
        else{
            //return  "Email & password are not matched.<br /> Try again";
			header("location:index.php?message=Email and password are not matched");
        }
    }
    public function signupInfo($data){ 
		//print_r($data);
	//print_r($_FILES);
		$name=$data['name'];
		$email=$data['email'];
		$password=$data['password'];		
		$defaultImage="assets/backend/img/user/default.jpg";
		//$imagePath=$defaultImage;
		//file image 
		$file = $_FILES['file'];
		$fileName=$_FILES['file']['name'];
		$filetype=$_FILES['file']['type'];
		$file_tmp_name=$_FILES['file']['tmp_name'];
		$file_upload_path="../assets/backend/img/user/".$fileName;
		$file_upload_database_path="assets/backend/img/user/".$fileName;
		$imagePath=$file_upload_database_path;

		$filetext=explode('.',$fileName);
		$fileExtention=strtolower(end($filetext));
		$upload_type=array('jpeg','png','jpg','ico','gif');	
		if(in_array($fileExtention,$upload_type)){
			$sql="INSERT INTO user (user_name, 	user_email, user_password, user_image) VALUES('$name','$email','$password','$imagePath')";
			mysqli_query($this->db->link, $sql);
			$message="Signup succesfull";
			if(move_uploaded_file($file_tmp_name,$file_upload_path)){
				$message="Signup  succesfull";
			}else{
			$message="image Upload unsuccessful";
			}		
		}else{			
			$message="Signup succesfull but image Upload unsuccessful <br /> Because image type is not jpeg, jpg, png, ico or gif";
			$sql="INSERT INTO user (user_name, 	user_email, user_password,user_image) VALUES('$name','$email','$password','$defaultImage')";
			mysqli_query($this->db->link, $sql);
		}
		header("location:?message=$message&messageStutuse=succes");
    }

}

?>