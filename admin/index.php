<?php
    session_start();
	if(isset($_SESSION['userName'])){
		header("location:dashboard.php");
	}
	else{
		include_once '../class/login.php';
		$userLogin=new login();
		//print_r($_POST);
		if(isset($_POST['submit'])){
			$message=$userLogin->chechAdminInfo($_POST);
		}
		if(isset($_POST['signup'])){                    
			$message=$userLogin->signupInfo($_POST);
			//print_r($_POST);
			//print_r($_FILES);

		}
?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>IBIT Books</title>
	<link rel="icon" href="../assets/frontend/img/favicon.ico" />
	 <link rel="stylesheet" href="../assets/frontend/w3css/w3.css" />
	<link rel="stylesheet" href="../assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
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
<body>
<div class="row"> 
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<?php
		if(isset($_GET['message'])&&isset($_GET['messageStutuse'])){
			//print_r($_GET);
			if($_GET['messageStutuse']=='succes'){
				?>
				<div class="btn btn-success btn-group-justified w3-animate-zoom">
				<?php
					echo $_GET['message'];
				?>
			</div>	
				<?php
			}else{
				?>
				<div class="btn btn-danger btn-group-justified w3-animate-zoom">
					<?php
						echo $_GET['message'];
					?>
				</div>	
				<?php
			}
		}elseif(isset($_GET['message'])){
			?>			
			<div class="btn btn-danger btn-group-justified w3-animate-zoom">
				<?php
					echo $_GET['message'];
				?>
			</div>	
			<?php
		}
	?>
		<div class="btn-group-justified"> 
			<div class="btn  "> 
				<input class="btn btn-lg btn-info" style='width:100%; height:100%;'  type="button"  data-toggle="tab" href="#login" value="login" />			
			</div>
			<div class="btn "> 
				<input class="btn btn-lg btn-info" style='width:100%; height:100%;'  type="button"  data-toggle="tab" href="#submit" value="sign up" />		
			</div>
		</div>
		
	</div>
	<div class="col-md-4"></div>
</div>


<div class="tab-content"> 


	<!--login-->
	<div id='login' class='tab-pane fade in active' style=' padding:50px;'>
		<div class="row"> 
			<div class="col-md-12 text-center">
				<h3 class='text-center'>login Form</h3>
			</div>
		</div>
		<div class='row text-left'> 
			<div class="col-md-4"></div>
			<div class="col-md-4 bg-form">
				<form action="" method='POST'>
					<div class="form-group">
						<label for="email">Email</label>	
						<input type="email" id='email' name='email' class="form-control input-lg" placeholder='email...' required />					
					</div>
					<div class="form-group">
						<label for="password">Password</label>	
						<input type="password" id='password' name='password' class="form-control input-lg" placeholder='password...' required />					
					</div>
					<div class="text-center">
							<input type="submit" name='submit' value='login' class="btn-lg btn-success" style='' onclick='confirm("আপনি কি সঠিক তথ্য দিয়েছেন!  তাহলে ok প্রেস করুন।");' />							
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
		<div id='submit' class="container-fluid bg-5 tab-pane fade" id='admition'> 
				<div class="container">
					<h3 class='text-center'>Sign up Form</h3>
					<div class="row"> 						
						<div class="col-md-4"></div>
						<div class="col-md-4 bg-form">
                            <form action="" method="POST" enctype="multipart/form-data">                                                            
								<div class="form-group">
										<label for="">Picture</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>									
										<input type="file" accept='image/*' id='image' name='file' class="form-control input-lg" title='Please add 1:1 ratio picture...' placeholder='1:1 ratio picture...' />
									</div>
								</div>
								<div class="form-group">
									<label for="name">Name</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
										<input type="text" id='name' name='name' class="form-control input-lg" placeholder='Name...' required />
									</div>
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<div class="input-group"> 
									<span class="input-group-addon"><span class="glyphicon glyphicon-email">&#9993</span></span>
										<input type="email" id='email' name='email' class="form-control input-lg" placeholder='email...' required />
								
									</div>					
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<div class="input-group"> 
									<span class="input-group-addon"><span class="glyphicon glyphicon-email">&#9993</span></span>
										<input type="password" id='password' name='password' class="form-control input-lg" placeholder='password...' required />
								
									</div>					
								</div>
                                                            <!--
								<div class="form-group">
										<label for="phnNmbr">Phone Number</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
										<input type="text" id='phnNmbr' name='phnNmbr' class="form-control input-lg" placeholder='Phone number...' required />
									</div>
								</div>
								<div class="form-group">
										<label for="fName">Father's Name</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
										<input type="text" id='fnmatch' name='fName' class="form-control input-lg" placeholder="Father's name..." required />
									</div>
								</div>
								<div class="form-group">
										<label for="mName">Mother's Name</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
										<input type="text" id='mName' name='mName' class="form-control input-lg" placeholder="Mother's name..." required />
										</div>
								</div>
								<div class="form-group">
										<label for="dob">Date of Birth</label>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										<input type="date" id='dob' name='dob' class="form-control input-lg" placeholder='Date of birth...' required />
									</div>
								</div>
                                                            -->
								<div class=" text-center ">						
									<input class='' type="checkbox" / required> Accept <a href="condition.php" target="_blank" >condition</a>
								</div>
								<div class="form-group"></div>
								<div class="text-center">
									<input type="submit" name='signup' value='submit' class="btn-lg btn-success" style='' onclick='confirm("আপনি কি সঠিক তথ্য দিয়েছেন!  তাহলে ok প্রেস করুন।");' />
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
?>