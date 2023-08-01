<?php

include_once 'database.php';

class book{
    public $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function insertBookinfo($data) {
       
		$bookName=$data['bookName'];
		$bookCode=$data['bookCode'];
		$totalBook=$data['totalBook'];
		
		$Author=$data['author'];
		$price=$data['price'];
		$date=$data['date'];
		$publication=$data['publication'];
		
		
		$file = $_FILES['file'];
		$fileName=$_FILES['file']['name'];
		$filetype=$_FILES['file']['type'];
		$file_tmp_name=$_FILES['file']['tmp_name'];
		$file_upload_path="../assets/frontend/img/books/".$fileName;
		$file_upload_database_path="assets/frontend/img/books/".$fileName;
		
		$filetext=explode('.',$fileName);
		$fileExtention=strtolower(end($filetext));
		$upload_type=array('jpeg','png','jpg','ico','gif');
		if(in_array($fileExtention,$upload_type)){			
			$sql="INSERT INTO lmsbooks ( book_name,book_image, book_code, book_total,Author,Publication,Price,Date,	book_stored) VALUES('$bookName','$file_upload_database_path','$bookCode','$totalBook','$Author','$publication','$price','$date','$totalBook')";
			mysqli_query($this->db->link, $sql);
			
			if(move_uploaded_file($file_tmp_name,$file_upload_path)){
				//echo ' <p class="text-success">File Upload successful</p>';
			}else{
				//echo ' <p class="text-danger">File Upload unsuccessful</p>';
			}
		}else{
			//echo'<p class="text-danger">file type is not png/jpg/jpeg type<br /> please add png/jpg/jpeg type file<br /></p>';			
			?>
			<script type="text/javascript"> 
				alert("file type is not png/jpg/jpeg type<br /> please add png/jpg/jpeg type file");
			</script>
			<?php
		}
		header("addBook.php?message=book added succesfull!");
    }
	public function deletebook($deletId){
		$sql="DELETE FROM lmsbooks WHERE book_id=$deletId";
		mysqli_query($this->db->link, $sql);
		header("location:manageBook.php");
	}
	public function editBook($editData){
	}
}

?>