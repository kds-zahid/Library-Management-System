<?php
    session_start();
	if(isset($_SESSION['userName'])){
		//objAdmin
		include '../class/admin.php';
		$objAdmin=new Admin();
		$studentInfo=$objAdmin->studentInfo();
		$bookInfo=$objAdmin->booksInfo();
		
		//insert given book info
		if(isset($_POST['getBook'])){
			$message=$objAdmin->insertGivenBookInfo($_POST);
		}
?>



<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Book's form</title>
	<link rel="icon" href="../assets/frontend/img/favicon.ico" />
	<link rel="stylesheet" href="../assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/frontend/w3css/w3.css" />
        <link rel="stylesheet" href="../assets/frontend/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="../assets/frontend/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css"> 
		body{
			background-image:url("../assets/backend/img/loginAndSignUp/comp010.jpg");
		}
		.bg-form{
			background-color:white;
			border-radius:25px;
			border:1px solid black;
			padding:20px;
		}
	</style>
</head>
<body class="">
<?php				
		if(isset($_GET['message'])){
			//print_r($_GET);
			if($_GET['messageStutuse']=='succes'){
				?>
					<div class="btn btn-success btn-group-justified w3-animate-zoom">
					<?php
						echo $_GET['message'];
					?>
					</div>
				<?php
			}
			if($_GET['messageStutuse']=='danger'){
				?>
					<div class="btn btn-danger btn-group-justified w3-animate-zoom">
					<?php
						echo $_GET['message'];
					?>
					</div>
				<?php
			
			}
		}
	?>

<div class="row w3-animate-zoom"> 
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="btn-group-justified"> 
					<div class="btn  "> 
						<input class="btn btn-lg btn-info" style='width:100%; height:100%;'  type="button"  data-toggle="tab" href="#getBook" value="Get book" />			
					</div>
					<!-- <div class="btn "> 
						<input class="btn btn-lg btn-info" style='width:100%; height:100%;'  type="button"  data-toggle="tab" href="#returnBook" value="Return book" />		
					</div> -->
				</div>
			</div>
			<div class="col-md-4"></div>
</div>

<div class="tab-content w3-animate-zoom"> 


	<!--login-->
        <div id='getBook' class="tab-pane fade <?php if(isset($_GET['getBook'])){echo 'in active';} ?>" style=' padding:50px;'>
		<div class="row"> 
			<div class="col-md-12 text-center">
				<h3 class='text-center'>Get book</h3>
			</div>
		</div>
		<div class='row text-left'> 
			<div class="col-md-4"></div>
			<div class="col-md-4 bg-form w3-animate-zoom">
				<form action="" method='POST'>
					<div class="form-group">
						<label for="code">book's code</label>	
						<input list="bookCode" value="<?php if(isset($_GET['bookCode'])){echo $_GET['bookCode'];} ?>" <?php if(isset($_GET['bookCode'])){echo 'readonly style="cursor:no-drop;"';} ?> type="" id='code' name='code' class="form-control input-lg" placeholder="enter book's code here" required />		
							<datalist id="bookCode"> 
								<?php
									while($row=mysqli_fetch_assoc($bookInfo)){
										?>
										<option value="<?php echo $row['book_code']?>"><?php echo $row['book_name']?></option>
										<?php
									}
								?>
							</datalist>	
						
					</div>					
					<?php if(isset($_GET['bookCode'])){
						?>
					<div class="form-group">
						<label for="name">book's name</label>	
						<input value="<?php echo $_GET['bookName'];?>" <?php echo 'readonly  style="cursor:no-drop;"';?> type="text" id='name' name='name' class="form-control input-lg" placeholder="enter book's name here..." required />					
					</div>					
						
						<?php
					} ?>					
					<div class="form-group">
						<label for="roll">student's roll</label>	
						<input list="studentRoll" type="" id='roll' name='roll' class="form-control input-lg" placeholder="enter student's roll here..." required />
							<datalist id="studentRoll"> 
								<?php
									while($row=mysqli_fetch_assoc($studentInfo)){
										?>
										<option value="<?php echo $row['student_roll']?>"><?php echo $row['student_name']?></option>
										<?php
									}
								?>
							</datalist>						
					</div>					
					<div class="form-group">						
						<label for="date">Date</label>	
						<input type="" id='date' name='date' class="form-control input-lg" placeholder='date...' value="<?php echo date("Y/m/d"); ?>" readonly required />					
					</div>
					<div class="text-center">
							<input type="submit" name='getBook' value='get' class="btn-lg btn-success" style='' onclick='confirm("আপনি কি সঠিক তথ্য দিয়েছেন!  তাহলে ok প্রেস করুন।");' />							
							<h4 style="color:red;">
								<?php 
									if(isset($message)){
										echo $message;
									}
									if(isset($_SESSION['message'])){
										echo $_SESSION['message'];
									}
								?>
							</h4>
						</div>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	<!--submit-->
		<div id='returnBook' class="container-fluid bg-5 tab-pane fade  <?php if(isset($_GET['returnBook'])){echo 'in active';} ?>" > 
				<div class="container">
					<h3 class='text-center'>Return books</h3>
					<div class="row"> 						
						<div class="col-md-4"></div>
						<div class="col-md-4 bg-form w3-animate-zoom">
                                                    <form action="" method='POST'>
                                                            <div class="form-group">
                                                                <label for="code">book's code</label>	
                                                                <input  list="bookCode" type="" id='email' name='code' class="form-control input-lg" placeholder='enter code here...' required />					
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="roll">student's roll</label>	
                                                                <input list="studentRoll" type="number" id='roll' name='roll' class="form-control input-lg" placeholder="enter student's roll here..." required />					
                                                            </div>																							
															<div class="form-group">
																<label for="date">Date</label>	
																<input type="" id='date' name='date' class="form-control input-lg" placeholder='date...' value="<?php echo date("Y/m/d"); ?>" readonly required />					
															</div>
                                                            <div class="text-center">
                                                                <input type="submit" name='returnBook' value='Return' class="btn-lg btn-success" style='' onclick='confirm("আপনি কি সঠিক তথ্য দিয়েছেন!  তাহলে ok প্রেস করুন।");' />							
                                                                <h4 style="color:red;">
                                                                    <?php
                                                                    if (isset($message)) {
                                                                        echo $message;
                                                                    }
                                                                    if (isset($_SESSION['message'])) {
                                                                        echo $_SESSION['message'];
                                                                    }
                                                                    ?>
                                                                </h4>
                                                            </div>
                                                        </form>
						</div>
						<div class="col-md-4"></div>					
					</div>
					
				</div>
			</div>
			
</div>
</body>
</html>




<?php
	}
	else{
		
		header("location:../admin/index.php");
?>

<?php
}
?>