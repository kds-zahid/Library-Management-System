<?php
	if(isset($_POST['upload'])){
		include_once "../class/book.php";
		$book=new book();
		$book->insertBookinfo($_POST);
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>add book</title>
		<link rel="icon" href="../assets/frontend/img/favicon.ico" />
	<link rel="stylesheet" href="../assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="../assets/frontend/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="contain " style='width:80%; margin:auto;'>	
					<div class="row">						
						<h3 class="text-center text-info">Add book</h3>
						<div class="col-md-12 ">
							<div class="thumbnail totalBooks "> 									
								<div class="bg-info" > 
									<form action="" method="POST"  enctype="multipart/form-data">
										<label for="">Picture</label>
										<div class="input-group">
											<input type="file" accept='image/*' id='image' name='file' class="form-control input-lg" title='Please add 20:9 ratio picture...' placeholder='20:9 ratio picture...'  />
										</div>
										<div class="form-group">
											<label for="bookName">book name</label>	
											<input type="name" id='bookName' name='bookName' class="form-control input-lg" placeholder='book name...'  />					
										</div>
										<div class="form-group">
											<label for="bookCode">Code</label>	
											<input type="number" id='bookCode' name='bookCode' class="form-control input-lg" placeholder="book's code..."  />					
										</div>
										<div class="form-group">
											<label for="totalBook">Total book</label>	
											<input type="number" id='totalBook' name='totalBook' class="form-control input-lg" placeholder='Total book...'  />					
										</div>
										<div class="text-center">
												<input type="submit" name='upload' value='Add' class="btn-lg btn-success" style='' onclick='confirm("আপনি কি সঠিক তথ্য দিয়েছেন!  তাহলে ok প্রেস করুন।");' />
											</div>
									</form>
								</div>
							</div>
						</div>
					</div>
			</div>
	</div>
</body>
</html>