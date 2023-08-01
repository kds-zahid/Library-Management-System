	<?php
		
		if(isset($_GET['editStatus'])){
			//print_r($_GET);
			$id=$_GET['studentId'];
			//print_r($id);
			$result=$onjAdmin->studentSelectInfo($id);
			$row=mysqli_fetch_assoc($result);
			//print_r($row);
		}
	?>
<div class="container" style='width:80%; margin:auto;'>	
<?php
if(isset($_GET['message'])){
	//print_r($_GET);
	if(isset($_GET['messageStutuse'])){
		if($_GET['messageStutuse']=='danger'){
			?>
				<div class="btn btn-danger btn-group-justified w3-animate-zoom">
				<?php
					echo $_GET['message'];
				?>
				</div>
			<?php
		
		}elseif($_GET['messageStutuse']=='succes'){
			?>
				<div class="btn btn-success btn-group-justified w3-animate-zoom">
				<?php
					echo $_GET['message'];
				?>
				</div>
			<?php
		
		}else{
			?>
				<div class="btn btn-success btn-group-justified w3-animate-zoom">
				<?php
					echo $_GET['message'];
				?>
				</div>
			<?php
		}
	}else{
		?>		
			<div class="btn btn-success btn-group-justified w3-animate-zoom">
			<?php
				echo $_GET['message'];
			?>
			</div>		
		<?php
	}
}
?>
								<?php
									if(isset($message)){
										?>
								<div class="row"> 
									<div class="btn btn-success btn-group-justified w3-animate-zoom"><?php echo $message; ?></div>
								</div>
								<?php
									}
								?>
								<div class="row">						
									<h3 class="text-center text-info">
									<?php
										if(isset($_GET['editStatus'])){echo 'Update student';}else{echo 'Add Student';}
									?>
									</h3>
									<div class="col-md-12 ">
										<div class="thumbnail totalBooks "> 									
											<div class="bg-info" > 
												<form action="" method="POST" enctype="multipart/form-data">
													<label for="">Picture</label>
													<div class="input-group">
														<input type="file" accept='image/*' id='image' name='file' class="form-control input-lg" title='Please add 1:1 ratio picture...'  />
													</div>
													<div class="form-group">
														<label for="name">Name</label>	
														<input type="name" id='name' name='name' class="form-control input-lg" placeholder="&#128107 Student's name..." value="<?php if(isset($row)){ echo $row['student_name'];} ?>" required />					
													</div>
													<div class="form-group">
														<label for="fname">Father's name</label>	
														<input type="name" id='fname' name='fname' class="form-control input-lg" placeholder="&#128115 Father's name..."  value="<?php if(isset($row)){ echo $row['fathersName'];} ?>" required />					
													</div>
													<div class="form-group">
														<label for="Address">Address</label>	
														<input type="name" id='Address' name='Address' class="form-control input-lg" placeholder="&#128506 Address..." value="<?php if(isset($row)){ echo $row['Address'];} ?>"  required />					
													</div>
													<div class="form-group">
														<label for="Pnumber">Phone number</label>	
														<input type="name" id='Pnumber' name='Pnumber' class="form-control input-lg" placeholder="&#128222 Phone number..." value="<?php if(isset($row)){ echo $row['PhoneNumber'];} ?>"  required />					
													</div>
													<div class="form-group">
														<label for="roll">Roll</label>	
														<input type="number" id='roll' name='roll' class="form-control input-lg" placeholder="&#128395 Student's roll..." value="<?php if(isset($row)){ echo $row['student_roll'];} ?>"  required />					
													</div>
													<div class="form-group">
														<label for="Technology">Technology</label>	
														<input list="TechnologyList" type="text" id='Technology' name='Technology' class="form-control input-lg" placeholder='&#128295 Technology...'  value="<?php if(isset($row)){ echo $row['student_technology'];} ?>" required />	
														<datalist id="TechnologyList">
															<option value="Computer">Computer</option>
															<option value="Electrical"></option>
															<option value="Civil"></option>
														</datalist>				
													</div>
													
													
													<input style="width:0px; height:0px; visibility:hidden;"  name="UpdateId" type="text" value="<?php if(isset($_GET['editStatus'])){echo $_GET['studentId']; }?>" readonly />
													<div class="text-center">
															<input type="submit" name="<?php if(isset($_GET['editStatus'])){ echo 'updateStudent';} else{ echo 'uploadStudent';} ?>" value="<?php if(isset($_GET['editStatus'])){ echo 'Update';} else{ echo 'AddStudent';} ?>" class="btn-lg btn-success" style='' onclick='confirm("???? ?? ???? ???? ???????!  ????? ok ????? ?????");' />
														</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>