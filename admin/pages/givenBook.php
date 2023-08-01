<?php 
	
	$studentInfo=$onjAdmin->studentInfo();
	//$bookName=$onjAdmin->booksSelectInfo(845151);
	if(isset($_GET['search'])){
		$roll=$_GET['searchRoll'];
		$result=$onjAdmin->givenBookInfo($roll);
		$studentInfo2=$onjAdmin->studentSelectInfoWithRoll($roll);
		$stdntRow=mysqli_fetch_assoc($studentInfo2);
		//print_r($stdntRow);
	}
?>
<div class="container "> 
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
		<div class="col-sm-2">
			<?php 
				if(isset($stdntRow)){
					?>
					<img class="img img-responsive" style="min-width:200px;" src="../<?php echo $stdntRow['student_image']; ?>" alt="" />
					<?php
				}
			?>
		</div>
		<div class="col-sm-6 text-left ">		
			<div class="container"> 			
				<?php
					if(isset($stdntRow)){
						?>
				<table border='0' class="text-left" style="height:200px;" >
						<tr>
							<td style="width:30%;"><b>Name: </b></td><td><?php echo $stdntRow['student_name']; ?></td>
						</tr>
						<tr>
							<td><b>Roll: </b></td><td><?php echo $stdntRow['student_roll']; ?></td>
						</tr>
						<tr>
							<td><b>Technology: </b></td><td><?php echo $stdntRow['student_technology']; ?></td>
						</tr>
						<tr>
							<td><b>Father's Name: </b></td><td><?php echo $stdntRow['fathersName']; ?></td>
						</tr>
						<tr>
							<td><b>Address: </b></td><td><?php echo $stdntRow['Address']; ?></td>
						</tr>
				</table>
						<?php
					}
				?>
			</div>
		</div>
		<div class="col-sm-4">
			<form action="" method="get">
				<div class="btn btn-primary input-group"> 
					<input list="studentRoll" class="form-control" name="searchRoll" type="search" placeholder="Input roll here..." required />
					<input name="search" class=" btn btn-primary" type="submit" value="Search" />
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
			</form>
		</div>		
	</div>
</div>
<table class="table table-striped table-hover">
	<thead>
		<th>Subject Code</th>
		<th>Subject Name</th>
		<th>Date</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php 
			if(isset($result)){
				while($row=mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?php echo $row['subjectCode']; ?></td>
						<td><?php echo $row['subjectName']; ?></td>
						<td><?php echo $row['getDate']; ?></td>
						<td>
							<a href="?returnBook=<?php echo $row['id']; ?>&searchRoll=<?php echo$_GET['searchRoll'];?>&subjectCode=<?php echo $row['subjectCode']; ?>" class="btn btn-success">Return</a>
						</td>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>