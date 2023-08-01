	<?php 
	$result=$onjAdmin->studentInfo();
			
	?>
<div class="container"> 
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
								<div class="row text-center"> 
									<div class="col-md-12">
										<h3>Student's list</h3>
										<h5>view all students</h5>
										<table class="table table-hover table-striped table-bordered text-center">
											<thead> 
												<th>image</th>
												<th>name</th>
												<th>father's name</th>
												<th>address</th>
												<th>phone number</th>
												<th colspan="1">Contact</th>
												<th>depertment</th>
												<th>roll</th>
												<th>action</th>
											</thead>
											<tbody> 
												<?php
					// output data of each row
					while($row =  mysqli_fetch_assoc($result)) {
						?> 
												<tr>
													<td>
														<a href="../<?php echo $row['student_image']; ?>">
															<img class="img-responsive" width="100" src="../<?php echo $row['student_image']; ?>" alt="" />
														</a>
													</td>
													<td><?php echo $row['student_name']; ?></td>
													<td><?php echo $row['fathersName']; ?></td>
													<td><?php echo $row['Address']; ?></td>
													<td><?php echo $row['PhoneNumber']; ?></td>
													<td><a href="tel:<?php echo $row['PhoneNumber']; ?>">&#128222</a>	<a href="sms:<?php echo $row['PhoneNumber']; ?>">&#128233</a></td>
													<td><?php echo $row['student_technology']; ?></td>
													<td><?php echo $row['student_roll']; ?></td>
													<td>
														<a href="updateStudent.php?editStatus=edit&studentId=<?php echo $row['student_id']; ?>" class="btn btn-lg btn-success <?php if($_SESSION['userLevel']==3 || $_SESSION['userLevel']==0){ echo 'disabled';} ?>">&#9997edit</a>
														<a class="btn btn-danger btn-lg <?php if($_SESSION['userLevel']!=1){ echo 'disabled';} ?> " href="?deleteStudent=delete&deleteStudentId=<?php echo $row['student_id']; ?>">&#128465</a>
													</td>
												</tr>
												
						<?php
					}
					?>
											</tbody>
										</table>
									</div>
								</div>
							</div>