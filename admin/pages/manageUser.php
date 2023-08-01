<?php 
	$result=$onjAdmin->userInfo();
	
	
?>
<div class="container"> 
<?php
if(isset($_GET['message'])){
	//print_r($_GET);
	if($_GET['messageStutuse']=='danger'){
		?>
			<div class="btn btn-danger btn-group-justified w3-animate-zoom">
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
}
?>
								<div class="row text-center"> 
									<div class="col-md-12">
										<h3>User's list</h3>
										<h5>view all users</h5>
										<table class="table table-hover table-striped table-bordered text-center table-responsive">
											<thead> 
												<th>image</th>
												<th>name</th>
												<th>email</th>
												<th>status</th>
												<th>level</th>
												<th>action</th>
											</thead>
											<tbody> 
											<?php 
												while($row= mysqli_fetch_assoc($result)){
													?>
														<tr>
													<td><img class="img-responsive" width="100" src="../<?php echo $row['user_image']; ?>" alt="" /></td>
													<td><?php echo $row['user_name']; ?></td>
													<td><?php echo $row['user_email']; ?></td>
													<td>
														<?php if($row['activation_status']=='1'){
														?>
														<div class="btn btn-success disabledC">active</div>
														<?php
														}else{ 
														?>
														<div class="btn btn-danger disabledC">deactive</div>
														<?php
														} ?>
													</td>
													<td><?php echo $row['user_level']; ?></td>
													<td>
														<?php if($row['activation_status']=='1'){
														?>
														<a class="btn btn-danger <?php if($_SESSION['userLevel']!=1){ echo 'disabled';} ?> " href="?stutus=deactive&id=<?php echo $row['user_id']; ?>">deactive</a>
														<?php
														}else{ 
														?>
														<a class="btn btn-success <?php if($_SESSION['userLevel']!=1){ echo 'disabled';} ?> " href="?stutus=active&&id=<?php echo $row['user_id']; ?>">active</a>
														<?php
														} ?>
														<a href="editUser.php?editUser=<?php echo $row['user_id']; ?>" class="btn btn-success <?php if($_SESSION['userLevel']!=1){ echo 'disabled';} ?>">&#9997edit</a>
														<a href="?deleteUser=<?php echo $row['user_id']; ?>" class="btn  btn-danger <?php if($_SESSION['userLevel']!=1){ echo 'disabled';} ?>">&#128465</a>
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