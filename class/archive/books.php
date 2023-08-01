<?php
	include_once "database.php";
	class books{
		public $db;
		public function __construct(){
			$this->db=new Database();
		}
		
		public function booksInfo(){					
			$sql = "SELECT * FROM lmsbooks";
			$result=mysqli_query($this->db->link,$sql);
			//$row = mysqli_fetch_assoc($result);
		?>
		<style type="text/css"> 
			.bg-library{
            background-color: white;
			}
			.bg-library .thumbnail{
				background-color:#8C79D7 ;
			}
			.bg-library a{
				color:white;
				font-weight: bold;
			}
			.bg-library img{
				width: 90%;
			}
		</style>
		<?php
				if ($result->num_rows > 0) {
					// output data of each row
					while($row =  mysqli_fetch_assoc($result)) {
						?> 
						<tr>
							<td><img class="img-responsive" width="100" src="../<?php echo $row['book_image']; ?>" alt="" /></td>
							<td><?php echo $row['book_name']; ?></td>
							<td><?php echo $row['book_code']; ?></td>
							<td><?php echo $row['book_stored']; ?></td>
							<td><?php echo $row['book_total']; ?></td>
							<td>
								<a class="btn btn-success btn-lg" href="BookView.php?view=view&viewID=<?php echo $row['book_id']; ?>">view</a>
								<a class="btn btn-info btn-lg" href="BookEdit.php?edit=edit&editId=<?php echo $row['book_id']; ?>">edit</a>
								<a class="btn btn-danger btn-lg" href="dashboard.php?delete=delete&deletId=<?php echo $row['book_id']; ?>">delete</a>
							</td>
						</tr>
						<?php
					}
				} else {
				}		
		}
	}
?>