	<?php 
	$result=$onjAdmin->booksInfo();
	if(isset($_GET['message']))	{
		$message=$_GET['message'];
	}
	?>
	<div class="container"> 
	<?php
	if(isset($message)){
		?>
	<div class="row"> 
		<!-- <div class="btn btn-success btn-group-justified w3-animate-zoom"></div> -->
		<?php echo $message; ?>
	</div>
	<?php
		}
	?>
								<div class="row text-center"> 
									<div class="col-md-12">
										<h3>Book's list</h3>
										<h5>view all books</h5>
										<table class="table table-hover table-striped table-bordered text-center">
											<thead class="text-center" style="text-align:center;"> 
												<th>Image</th>
												<th>Name</th>
												<th>Code</th>
												<th>Author Name</th>
												<th>Publication</th>
												<th>Price</th>
												<th>Date</th>
												<th>Stored</th>
												<th>Total</th>
												<th style="width:120px;">Action</th>
											</thead>
											<tbody>
		<?php
					// output data of each row
					while($row =  mysqli_fetch_assoc($result)) {
						?> 
						<tr>
							<td>
								<a href="../<?php echo $row['book_image']; ?>">
									<img class="img-responsive" width="100" src="../<?php echo $row['book_image']; ?>" alt="" />
								</a>
							</td>
							<td><?php echo $row['book_name']; ?></td>
							<td><?php echo $row['book_code']; ?></td>
							<td><?php echo $row['Author']; ?></td>
							<td><?php echo $row['Publication']; ?></td>
							<td><?php echo $row['Price']; ?></td>
							<td><?php echo $row['Date']; ?></td>
							<td><?php echo $row['book_stored']; ?></td>
							<td><?php echo $row['book_total']; ?></td>
							<td>
								<div class="row">
									<!-- <a class="btn btn-sm btn-success btn-lg" href="BookView.php?view=view&viewID=<?php echo $row['book_id']; ?>">view</a> -->
									<a class=" btn  btn-info  <?php if($_SESSION['userLevel']==3 || $_SESSION['userLevel']==0 ){ echo 'disabled';} ?>" href="updateBook.php?editBook=edit&editId=<?php echo $row['book_id']; ?>&bookPic=<?php echo $row['book_image']; ?>&bookName=<?php echo $row['book_name']; ?>&bookCode=<?php echo $row['book_code']; ?>&totalBook=<?php echo $row['book_total']; ?>&author=<?php echo $row['Author']; ?>&publication=<?php echo $row['Publication']; ?>&price=<?php echo $row['Price']; ?>&date=<?php echo $row['Date']; ?>">&#9997edit</a>
									<a class="btn btn-danger  <?php if($_SESSION['userLevel']!=1){ echo 'disabled';} ?>  " href="?delete=delete&deletId=<?php echo $row['book_id']; ?>">&#128465</a>
								</div>
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