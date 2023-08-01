<?php 
	if(isset($_GET['editUser'])){
		$id=$_GET['editUser'];
		$result=$onjAdmin->UserSelectInfo($id);
		$row = mysqli_fetch_assoc($result);
		//print_r($row);
	}
	
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
	<div id='submit' class="container-fluid bg-5 " id='admition'> 
				<div class="container">
					<h3 class='text-center'>Update user </h3>
					<div class="row"> 						
						<div class="col-md-4"></div>
						<div class="col-md-4 bg-form">
							<form action="" method="POST">                                                            
								<div class="form-group">
										<label for="">Picture</label>
									<div class="input-group">
										<span class="input-group-addon">&#128248 </span>
										<input type="file" accept='image/*' id='image' name='image' class="form-control input-lg"  placeholder='P.P. size picture...' readonly />
									</div>
								</div>
								<div class="form-group">
									<label for="name">Name</label>
									<div class="input-group">
										<span class="input-group-addon">&#128107 </span>
										<input type="text" id='name' name='name' class="form-control input-lg" placeholder='Name...' value="<?php if(isset($row)){ echo $row['user_name'];}?>" readonly required />
									</div>
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<div class="input-group"> 
									<span class="input-group-addon">&#128231 </span>
										<input type="email" id='email' name='email' class="form-control input-lg" placeholder='email...' value="<?php if(isset($row)){ echo $row['user_email'];}?>" readonly required />
								
									</div>					
								</div>
								<div class="form-group">
									<label for="">level</label>
									<div class="input-group">
										<span class="input-group-addon">&#128202 </span>
										<input name="level" type="number" min="0" max="3" class="form-control input-lg"  value="<?php if(isset($row)){ echo $row['user_level'];}?>" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<div class="input-group"> 
									<span class="input-group-addon">&#128272 </span>
										<input type="password" id='password' name='password' class="form-control input-lg" placeholder='password...' value="<?php if(isset($row)){ echo $row['user_password'];}?>" readonly required />								
									</div>					
								</div>
								 
								 
								<input style="width:0px; height:0px; visibility:hidden;"  name="UpdateId" type="text" value="<?php if(isset($_GET['editUser'])){echo $_GET['editUser']; }?>" readonly />
                                  
								<div class="form-group"></div>
								<div class="text-center">
									<input type="submit" name='userUpdate' value='update' class="btn-lg btn-success" style='' onclick='confirm("???? ?? ???? ???? ???????!  ????? ok ????? ?????");' />
								</div>
							</form>
						</div>
						<div class="col-md-4"></div>					
					</div>
					
				</div>
			</div>