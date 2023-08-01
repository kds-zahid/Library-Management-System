<div class="container" style='width:80%; margin:auto;'>	
<?php
	if(isset($message)){
		?>
<div class="row"> 
	<div class="btn btn-danger btn-group-justified w3-animate-zoom"><?php echo $message; ?></div>
</div>
<?php
	}
?>
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
								<div class="row"> 
									<h3 class="text-center text-info">
										<?php if(isset($_GET['editBook'])){ echo 'Update book'; }else{ echo 'Add book';}?> 
									</h3>
									<div class="col-md-12 ">
										<div class="thumbnail totalBooks "> 									
											<div class="bg-info" > 
												<form action=""  method="POST"  enctype="multipart/form-data" >
													<label for="">Picture</label>
													<div class="input-group">
														<input type="file" accept='image/*' id='image' name='file' class="form-control input-lg" title='Please add 1:1 ratio picture...' placeholder='1:1 ratio picture...' value="<?php if(isset($_GET['editBook'])){echo $_GET['bookPic']; }else{ echo '';}?>"  />
													</div>
													<div class="form-group">
														<label for="bookName">book name</label>	
														<input type="name" id='bookName' name='bookName' class="form-control input-lg" placeholder='&#128212 book name...' value="<?php if(isset($_GET['editBook'])){echo $_GET['bookName']; }else{ echo '';}?>" required />					
													</div>
													<div class="form-group">
														<label for="bookCode">Code</label>	
														<input type="number" id='bookCode' name='bookCode' class="form-control input-lg" placeholder="&#128223 book's code..." value="<?php if(isset($_GET['editBook'])){echo $_GET['bookCode']; }else{ echo '';}?>" required />					
													</div>
													<div class="form-group">
														<label for="totalBook">Total book</label>	
														<input type="number" id='totalBook' name='totalBook' class="form-control input-lg" placeholder='&#128218 Total book...' value="<?php if(isset($_GET['editBook'])){echo $_GET['totalBook']; }else{ echo '';}?>" required />					
													</div>
													<div class="form-group">
														<label for="">Author Name</label>
														<input type="name" name="author" class="form-control input-lg" placeholder="&#128221Author name........." value="<?php if(isset($_GET['editBook'])){echo $_GET['author']; }else{ echo '';}?>" required />
													</div>
													<div class="form-group">
														<label for="">Publication</label>
														<input type="name" name="publication" list="publication" class="form-control input-lg" placeholder="&#127974 publication name........." value="<?php if(isset($_GET['editBook'])){echo $_GET['publication']; }else{ echo '';}?>" required />
														<datalist id="publication"> 
															<option value="Technical Prokashoni">Technical Prokashoni</option>
															<option value="Houqe Prokashoni">Houqe Prokashoni</option>
														</datalist>
													</div>
													<div class="form-group">
														<label for="">Price</label>
														<input type="number" name="price" class="form-control input-lg" placeholder="&#128176 Book's price........." value="<?php if(isset($_GET['editBook'])){echo $_GET['price']; }else{ echo '';}?>" required />
													</div>
													<div class="form-group">
														<label for="">Date</label>
														<input type="<?php if(isset($_GET['editBook'])){ echo 'date'; }?>" name="date" class="form-control input-lg" placeholder="&#128197 date........." value="<?php if(isset($_GET['editBook'])){echo $_GET['date']; }else{ echo date("Y/m/d");}?>" <?php if(isset($_GET['editBook'])){ }else{ echo 'readonly';}?> required />
													</div>
													
													
													<input style="width:0px; height:0px; visibility:hidden;"  name="UpdateId" type="text" value="<?php if(isset($_GET['editBook'])){echo $_GET['editId']; }else{ echo 'editId';}?>" readonly />
													
													<div class="text-center">
															<input type="submit" name="<?php if(isset($_GET['editBook'])){echo 'UpdateBook'; }else{ echo 'upload';}?>" value="<?php if(isset($_GET['editBook'])){echo 'Update'; }else{ echo 'Submit';}?>" class="btn-lg btn-success" style='' onclick='confirm("আপনি কি সঠিক তথ্য দিয়েছেন!  তাহলে ok প্রেস করুন।");' />
														</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>