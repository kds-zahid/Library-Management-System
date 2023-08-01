<?php 

include_once 'database.php';

class admin{
	//constructor method
		public $db;
		public function __construct() {
		$this->db = new Database();
		}
	//logout 
		public function logout() {
			 session_destroy();
			 $_SESSION['message']='you are successfully logout!';
			 header("location:index.php?message=you are successfully logout!");
		}
	//book info
		public function booksInfo(){					
			$sql = "SELECT * FROM lmsbooks ORDER BY book_id DESC";
			$result=mysqli_query($this->db->link,$sql);
			return $result;
		}
	//student info
		public function studentInfo(){					
			$sql = "SELECT * FROM lms_student ORDER BY student_id DESC";
			$result=mysqli_query($this->db->link,$sql);
			return $result;
		}
	//user  info
		public function userInfo(){					
			$sql = "SELECT * FROM user ORDER BY user_id DESC";
			$result=mysqli_query($this->db->link,$sql);
			return $result;
		}
	// given book info
		public function givenBookInfo($roll){
			$sql="SELECT * FROM lmsgivenbook WHERE stdntRoll='$roll'";
			$result=mysqli_query($this->db->link,$sql);
			return $result;
		}
	//Return book
		public function ReturnBook($returnid,$roll,$subjectCode){	
		// increment stored book
			$bookCode=$subjectCode;
			// update stored book status
			$sql = "SELECT * FROM lmsbooks WHERE book_code='$bookCode'";
			$StoredBookResult=mysqli_query($this->db->link,$sql);
			$StoredBookResult=mysqli_fetch_assoc($StoredBookResult);
			$storedBook=$StoredBookResult['book_stored'];
			$bookId=$StoredBookResult['book_id'];
			$storedBook++;
			$sql="UPDATE lmsbooks SET book_stored='$storedBook'  WHERE  book_id='$bookId'";	
			mysqli_query($this->db->link, $sql);
		//return book delete
			$sql="DELETE FROM lmsgivenbook WHERE id=$returnid";
			mysqli_query($this->db->link, $sql);			
			header("location:givenBook.php?message=Return succesfull&messageStutuse=succes&searchRoll=$roll&search=Search");
		}
	//book info WITH ID
		public function booksSelectInfo($id){					
			$sql = "SELECT * FROM lmsbooks WHERE book_id='$id'";
			$result=mysqli_query($this->db->link,$sql);
			return $result;
		}
	//student info with id
		public function studentSelectInfo($stdntId){					
			$sql = "SELECT * FROM lms_student WHERE student_id=$stdntId";
			$result=mysqli_query($this->db->link,$sql);
			return $result;
		}
	//student info with rol
		public function studentSelectInfoWithRoll($stdntRoll){					
			$sql = "SELECT * FROM lms_student WHERE student_roll=$stdntRoll";
			$result=mysqli_query($this->db->link,$sql);
			return $result;
		}
	//user info with id
	 public function UserSelectInfo($id) {
        $sql = "SELECT * FROM user WHERE user_id='$id'";
        $result = mysqli_query($this->db->link, $sql);
		return $result;        
    }
	//delete book 
		public function deletebook($deletId){
			$sql="DELETE FROM lmsbooks WHERE book_id=$deletId";
			mysqli_query($this->db->link, $sql);
			$message="<div class='btn btn-danger btn-group-justified w3-animate-zoom'>book delete succesfull</div>";
			//header("location:manageBook.php?message='$message'");
			return $message;
		}	
	//delete student 
		public function deleteStudent($deletId){
			$sql="DELETE FROM lms_student WHERE student_id=$deletId";
			mysqli_query($this->db->link, $sql);
			header("location:manageStudent.php");
		}		
	//delete user  
		public function deleteUser($deletId){
			$sql="DELETE FROM user WHERE user_id=$deletId";
			mysqli_query($this->db->link, $sql);
			header("location:manageUser.php?message=Delete succesfull&messageStutuse=danger");
		}	
	//deactive user 
		public function userDeactivate($Id){
			$id=$Id;
			$sql="UPDATE user SET activation_status='0' WHERE user_id='$id'";
			mysqli_query($this->db->link, $sql);
			header("location:manageUser.php?message=Dective succesfull&messageStutuse=danger");
		}		
	//active user 
		public function userActivate($Id){
			$id=$Id;
			$sql="UPDATE user SET 	activation_status='1' WHERE user_id='$id'";
			mysqli_query($this->db->link, $sql);
			header("location:manageUser.php?message=Active succesfull&messageStutuse=succes");
		}
	//update user info
		public function updateUserInfo($data){
			//print_r($data);
			$UpdateId=$data['UpdateId'];
			$level=$data['level'];
			$sql="UPDATE user SET user_level='$level' WHERE user_id='$UpdateId'";
			mysqli_query($this->db->link, $sql);
			header("location:manageUser.php?message=update succesfull&messageStutuse=succes");
		}
	//Update_book info
		public function updateBookinfo($data){
			$id=$data['UpdateId'];
			$bookName=$data['bookName'];
			$bookCode=$data['bookCode'];
			$totalBook=$data['totalBook'];
			// check new book start
			$sql="SELECT * FROM lmsbooks WHERE book_id='$id'";
			$result=mysqli_query($this->db->link,$sql);
			$row=mysqli_fetch_assoc($result);
			$db_totalBook=$row['book_total'];
			$db_storedBook=$row['book_stored'];
			$newBook=$totalBook-$db_totalBook;
			$newStoredBook=$db_storedBook+$newBook;
			//check new book end
			if($newStoredBook<0){
				$message="book update unsuccesfull! <br /> because stored book less than 0";
				return $message;
			}else{				
				$Author=$data['author'];
				$publication=$data['publication'];
				$price=$data['price'];
				$date=$data['date'];
				$message="<div class='btn btn-success btn-group-justified w3-animate-zoom'>book updated succesfull</div>";
				//image file
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
					$sql="UPDATE lmsbooks SET book_image='$file_upload_database_path',book_name='$bookName' ,book_code='$bookCode',book_total='$totalBook', book_stored='$newStoredBook',Author='$Author',Publication='$publication',Price='$price',Date='$date'  WHERE  book_id='$id'";
					
					if(move_uploaded_file($file_tmp_name,$file_upload_path)){						
						$message="<div class='btn btn-success btn-group-justified w3-animate-zoom'>book and image updated succesfull</div>";
					}else{											
					}
				}else{					
					$sql="UPDATE lmsbooks SET book_name='$bookName' ,book_code='$bookCode',book_total='$totalBook' , book_stored='$newStoredBook',Author='$Author',Publication='$publication',Price='$price',Date='$date'  WHERE  book_id='$id'";	
				}			
				mysqli_query($this->db->link, $sql);
				//print_r($message);
				header("location:manageBook.php?message=$message");
				
			}
		}
	//update student data
		public function UpdateStudentinfo($data){
			//print_r($data);
			$id=$data['UpdateId'];
			$Name=$data['name'];
			$roll=$data['roll'];
			$technology=$data['Technology'];
			$fathersName=$data['fname'];
			$address=$data['Address'];
			$phoneNumber=$data['Pnumber'];
			
			//file image 
			
			$file = $_FILES['file'];
			$fileName=$_FILES['file']['name'];
			$filetype=$_FILES['file']['type'];
			$file_tmp_name=$_FILES['file']['tmp_name'];
			$file_upload_path="../assets/frontend/img/students/".$fileName;
			$file_upload_database_path="assets/frontend/img/students/".$fileName;
			$imagePath=$file_upload_database_path;
			
			$filetext=explode('.',$fileName);
			$fileExtention=strtolower(end($filetext));
			$upload_type=array('jpeg','png','jpg','ico','gif');
			if(in_array($fileExtention,$upload_type)){			
				$sql="UPDATE lms_student SET student_image='$file_upload_database_path',student_name='$Name',fathersName='$fathersName',Address='$address',PhoneNumber='$phoneNumber',student_roll='$roll',student_technology='$technology'  WHERE  student_id='$id'";
				$message="Student Updated succesfull";
				if(move_uploaded_file($file_tmp_name,$file_upload_path)){
					$message="Student Updated succesfull & image uploaded";
				}else{
					
					$message="image upload unsuccesfull!";
				}
			}else{
				$sql="UPDATE lms_student SET student_name='$Name',fathersName='$fathersName',Address='$address',PhoneNumber='$phoneNumber',student_roll='$roll',student_technology='$technology'  WHERE  student_id='$id'";					
				$message="Student Updated succesfull";
			}
			//end file image 
			
			mysqli_query($this->db->link, $sql);
			header("location:manageStudent.php?message=$message");
		}
	//insert book 
		public function insertBookinfo($data) {
			$bookName=$data['bookName'];
			$bookCode=$data['bookCode'];			
		//check duplicate start		
			$sql = "SELECT * FROM lmsbooks WHERE book_code='$bookCode'";
			$resultBook=mysqli_query($this->db->link, $sql);				
			if($row=mysqli_fetch_assoc($resultBook)){
				header("location:addBook.php?message=book added Unsuccesfull! <br /> because book code alrady exist. &messageStutuse=danger");				
			}
			else{
		// check duplicate end 
				$totalBook=$data['totalBook'];			
				$Author=$data['author'];
				$price=$data['price'];
				$date=$data['date'];
				$publication=$data['publication'];
				
				$defaultImage='assets/frontend/img/books/defaultBookImage.jpg';
				
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
					}else{
					}
				}else{
					$sql="INSERT INTO lmsbooks ( book_name,book_image, book_code, book_total,Author,Publication,Price,Date,	book_stored) VALUES('$bookName','$defaultImage','$bookCode','$totalBook','$Author','$publication','$price','$date','$totalBook')";
					mysqli_query($this->db->link, $sql);
				}
				header("location:addBook.php?message=book added succesfull!");
				//return "book added succesfull";
			}
		}
	//insert student data
		public function insertStudentinfo($data){
			//print_r($data);
			$Name=$data['name'];
			$roll=$data['roll'];
					
		//check duplicate start		
			$sql = "SELECT * FROM lms_student WHERE student_roll='$roll'";
			$resultBook=mysqli_query($this->db->link, $sql);				
			if($row=mysqli_fetch_assoc($resultBook)){
				header("location:?message=Student added Unsuccesfull! <br /> because student roll alrady exist. &messageStutuse=danger");				
			}
			else{
		// check duplicate end 
			$technology=$data['Technology'];
			$fathersName=$data['fname'];
			$address=$data['Address'];
			$phoneNumber=$data['Pnumber'];
			$defaultImage="assets/frontend/img/students/default.jpg";
			//file image 
			
			$file = $_FILES['file'];
			$fileName=$_FILES['file']['name'];
			$filetype=$_FILES['file']['type'];
			$file_tmp_name=$_FILES['file']['tmp_name'];
			$file_upload_path="../assets/frontend/img/students/".$fileName;
			$file_upload_database_path="assets/frontend/img/students/".$fileName;
			$imagePath=$file_upload_database_path;
			
			$filetext=explode('.',$fileName);
			$fileExtention=strtolower(end($filetext));
			$upload_type=array('jpeg','png','jpg','ico','gif');
			if(in_array($fileExtention,$upload_type)){			
				$sql="INSERT INTO lms_student (student_name, student_roll,student_image, student_technology,fathersName,Address,PhoneNumber) VALUES('$Name','$roll','$imagePath','$technology','$fathersName','$address','$phoneNumber')";
				mysqli_query($this->db->link, $sql);
				$message="Student added succesfull";
				if(move_uploaded_file($file_tmp_name,$file_upload_path)){
					$message="Student added succesfull";
				}else{
					$message="File Upload unsuccessful";
				}
			}else{
				$sql="INSERT INTO lms_student (student_name, student_roll,student_image, student_technology,fathersName,Address,PhoneNumber) VALUES('$Name','$roll','$defaultImage','$technology','$fathersName','$address','$phoneNumber')";
				mysqli_query($this->db->link, $sql);		
			$message="Student added succesfull";
			}
			//end file image 			
			header("location:?message=$message&messageStutuse=succes");
			//return $message;
			}
		}
	//insert admin
		public function insertAdminInfo($data){
			
		}
	// insert given book info
		public function insertGivenBookInfo($data){
			$studentRoll=$data['roll'];
			$bookCode=$data['code'];
			//print_r($data);
		//check duplicate given book
			$sql="SELECT * FROM lmsgivenbook WHERE stdntRoll='$studentRoll' AND subjectCode='$bookCode'";
			$result=mysqli_query($this->db->link, $sql);
			if($row=mysqli_fetch_assoc($result)){
				//print_r($row);
				header("location:?getBook=getBook&message=Given Unsuccesfull! <br />Because book alredy given! &messageStutuse=danger");
			}else{
			// update stored book status
				$sql = "SELECT * FROM lmsbooks WHERE book_code='$bookCode'";
				$StoredBookResult=mysqli_query($this->db->link,$sql);
				$StoredBookResult=mysqli_fetch_assoc($StoredBookResult);
				$storedBook=$StoredBookResult['book_stored'];
				$bookId=$StoredBookResult['book_id'];
				//print_r($bookId);
				//print_r($storedBook);
				if($storedBook>0){
					$storedBook--;
					//print_r($storedBook);
					$sql="UPDATE lmsbooks SET book_stored='$storedBook'  WHERE  book_id='$bookId'";	
					mysqli_query($this->db->link, $sql);
				// insert given book info
					$sql = "SELECT * FROM lmsbooks WHERE book_code='$bookCode'";
					$resultBook=mysqli_query($this->db->link, $sql);
					$rowBook=mysqli_fetch_assoc($resultBook);
					$bookName=$rowBook['book_name'];
					//print_r($bookName);
					$givenDate=$data['date'];
					$sql="INSERT INTO lmsgivenbook (stdntRoll, subjectCode,subjectName, getDate) VALUES('$studentRoll','$bookCode','$bookName','$givenDate')";
					mysqli_query($this->db->link, $sql);
					header("location:?getBook=getBook&message=Given succesfull&messageStutuse=succes");
				}else{
					header("location:?getBook=getBook&message=Given Unsuccesfull! <br />Because book alrady finished! &messageStutuse=danger");
				}
			}
			
		}
		public function persentCal($dataTotal,$dataSimple){
			//$persent=$simpleValue+totalValue;
			$persent=$dataSimple/$dataTotal*100;
			return $persent;
		}

}
?>