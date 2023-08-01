<?php 

		//get book page		
		//$getBookPageStudentInfo=$onjAdmin->studentInfo();
		$studentInfo=$onjAdmin->studentInfo();
		$bookInfo=$onjAdmin->booksInfo();	
?>
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
<div class="container"> 

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

	<div class="row"> 
		<div class="col-md-12 text-center">
			<h3 class='text-center'>Get book</h3>
		</div>
	</div>
	<div class='row text-left'> 
		<div class="col-md-4"></div>
		<div class="col-md-4 bg-form">
			<form action="" method='POST'>
				<div class="form-group">
					<label for="code">book's code</label>	
					<input list="bookCode" value="<?php if(isset($_GET['bookCode'])){echo $_GET['bookCode'];} ?>" type="" id='code' name='code' class="form-control input-lg" placeholder="enter book's code here..." required />		
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
					<input value="<?php echo $_GET['bookName'];?>" type="text" id='name' name='name' class="form-control input-lg" placeholder="enter book's name here..." required />					
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
					<input type="" id='date' name='date' class="form-control input-lg" placeholder='date...'  value="<?php echo date("Y/m/d"); ?>" readonly  required />					
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