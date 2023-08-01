<?php
	if(isset($_SESSION['userId'])){
		$id=$_SESSION['userId'];		
		$result=$onjAdmin->UserSelectInfo($id);
		$row = mysqli_fetch_assoc($result);
	}
?>
<div class="contain">
	<div class="row text-center">
		<div class="col-sm-8 text-center " style="margin:auto; float:none;">
			<div class="row">
				<a href="../<?php echo $row['user_image']; ?>">
					<img class="img-responstive" style="height:200px; width:auto; border:3px solid tomato;" src="../<?php echo $row['user_image']; ?>" alt="" />
				</a>
			</div>
			<div class="row"> 
				<?php
					if(isset($row)){
						?>
				<table class="text-left table-hover" style="width:100%; height:200px;" >
						<tr>
							<td style="width:30%;"><b>Name: </b></td><td><?php echo $row['user_name']; ?></td>
						</tr>
						<tr>
							<td><b>Email: </b></td><td><?php echo $row['user_email']; ?></td>
						</tr>
						<tr>
							<td><b>Level: </b></td><td><?php echo $row['user_level']; ?></td>
						</tr>
						<tr>
							<td><b>Stutus: </b></td><td><?php if($row['activation_status']==1){ echo 'active';} else{echo'deactive';} ?></td>
						</tr>
				</table>
						<?php
					}
				?>
			</div>
		
		</div>
	</div>
</div>