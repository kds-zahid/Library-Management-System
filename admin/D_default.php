<?php
//Student______________________________________________________
	$studentInfo=$onjAdmin->studentInfo();
	$totalStudent=0;
	while($studentRow=mysqli_fetch_assoc($studentInfo)){
		$totalStudent++;
	}
	$maximumStudent=50*3*7;
	$totalStudentPersent=$onjAdmin->persentCal($maximumStudent,$totalStudent);
//Books______________________________________________________
	$bookInfo=$onjAdmin->booksInfo();
	$totalBookSet=0;
	$totalBook=0;
	$totalStoredBook=0;
	$totalBookAmount=0;
	$totalStoredBookAmount=0;
	$givenBookAmount=0;
	while($bookRow=mysqli_fetch_assoc($bookInfo)){
		$totalBookSet++;
		$totalBook+=$bookRow['book_total'];
		$totalStoredBook+=$bookRow['book_stored'];
		$givenBook=0;
		$givenBook=$bookRow['book_total']-$bookRow['book_stored'];
		$givenBookAmount+=$givenBook*$bookRow['Price'];
		$totalBookAmount+=$bookRow['Price']*$bookRow['book_total'];
		$totalStoredBookAmount+=$bookRow['Price']*$bookRow['book_stored'];
	}
	$totalUnstoredBook=$totalBook-$totalStoredBook;
	$neddedBookSetTotal=7*7*3;
	$neededBookSet=$neddedBookSetTotal-$totalBookSet;
	//persent
	$totalBookSetPersent=$onjAdmin->persentCal($neddedBookSetTotal,$totalBookSet);
	$neeededBookSetPersent=$onjAdmin->persentCal($neddedBookSetTotal,$neededBookSet);
	//$totalBookPersent=$onjAdmin->persentCal($neddedBookSetTotal,$totalBookSet);
	$totalStoredBookPersent=$onjAdmin->persentCal($totalBook,$totalStoredBook);
	$totalGivenBookPersent=$onjAdmin->persentCal($totalBook,$totalUnstoredBook);
//user______________________________________________________
	$userResult=$onjAdmin->userInfo();
	$calculateTtlUsr=0;
	$calculateActiveUsr=0;
	$calculateDeactiveUsr=0;
	$ActiveUsrLbl1=0;
	$ActiveUsrLbl2=0;
	$ActiveUsrLbl3=0;
	$ActiveUsrLbl0=0;
	while($userRow= mysqli_fetch_assoc($userResult)){
		$calculateTtlUsr++;
		//active user
		if($userRow['activation_status']=='1'){
			$calculateActiveUsr++;
		}
		//deactive user
		if($userRow['activation_status']!='1'){
			$calculateDeactiveUsr++;
		}
		//user level-1
		if($userRow['user_level']=='1'){
			$ActiveUsrLbl1++;
		}
		//user level-2
		if($userRow['user_level']=='2'){
			$ActiveUsrLbl2++;
		}
		//user level-3
		if($userRow['user_level']=='3'){
			$ActiveUsrLbl3++;
		}
		//user level-3
		if($userRow['user_level']=='0'){
			$ActiveUsrLbl0++;
		}
	}
	$activeUserPersent=$onjAdmin->persentCal($calculateTtlUsr,$calculateActiveUsr);
	$deactiveUserPersent=$onjAdmin->persentCal($calculateTtlUsr,$calculateDeactiveUsr);
	$ActiveUsrLbl1Persent=$onjAdmin->persentCal($calculateTtlUsr,$ActiveUsrLbl1);
	$ActiveUsrLbl2Persent=$onjAdmin->persentCal($calculateTtlUsr,$ActiveUsrLbl2);
	$ActiveUsrLbl3Persent=$onjAdmin->persentCal($calculateTtlUsr,$ActiveUsrLbl3);
	$ActiveUsrLbl0Persent=$onjAdmin->persentCal($calculateTtlUsr,$ActiveUsrLbl0);
?>
<div> 
<style type="text/css"> 
	.bdCbg{
		background:#5A1A8A;
		float:left;
		padding:1px;
		border-radius:5px;
		border:1px solid black;
		margin:5px;
		text-align:center;
		
	}
	.bdCbg .bdcbg-body{
		padding: 5 ;
		border-radius:5px;
		border:1px solid white;
		background:cyan;			
		background-image:url('../assets/backend/img/bg/chainlink.gif');	
		color:tomato;
	}
	.bdCbg h3{
		margin-top:0;
		background:black;
		background-image:url("../assets/backend/img/bg/grymarb.gif");
		color:tomato;
		padding:5px;
		border-radius:5px;
		border:1px solid tomato;
	}
	.bdCbg h5{
		background:white;
	}
</style>

	
</div>

<div id='books' class="container-fluid" style=""> 
	<div class="container-fluid"> 
		
	</div>
	<div class="container-fluid">
		<div class="row">
			<h3 class="text-info text-center">Books</h3>
		</div>
		<div class="row"> 
			<div class="col-md-12">
				<div class="row w3-animate-top">
					<div class="container-fluid">
						<div class="bdCbg"> 
							<div class="bdcbg-body">
								<h3>Total books</h3>
								<h5><?php echo $totalBook;?></h3>
							</div>
						</div>
						<div class="bdCbg"> 
							<div class="bdcbg-body">
								<h3>Stored books</h3>
								<h5><?php echo $totalStoredBook;?></h5>
							</div>
						</div>
						<div class="bdCbg"> 
							<div class="bdcbg-body">
								<h3>given books</h3>
								<h5><?php echo $totalUnstoredBook;?></h5>
							</div>
						</div>
						<div class="bdCbg"> 
							<div class="bdcbg-body">
								<h3>Total book's set</h3>
								<h5><?php echo $totalBookSet;?></h5>
							</div>
						</div>
						<div class="bdCbg"> 
							<div class="bdcbg-body">
								<h3>Needed books set</h3>
								<h5><?php echo $neededBookSet;?></h5>
							</div>
						</div>
						<div class="bdCbg"> 
							<div class="bdcbg-body">
								<h3>Total books amount</h3>
								<h5><?php echo $totalBookAmount.' TK';?></h5>
							</div>
						</div>
						<div class="bdCbg"> 
							<div class="bdcbg-body">
								<h3>Total stored books amount</h3>
								<h5><?php echo $totalStoredBookAmount.' TK';?></h5>
							</div>
						</div>
						<div class="bdCbg"> 
							<div class="bdcbg-body">
								<h3>Total given books amount</h3>
								<h5><?php echo $givenBookAmount." TK";?></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<style type="text/css"> 
				
		.anianimation{
			animation:5s progress1 normal;
		}
		@keyframes progress1{
			0%{width:0%;}
			100%{width:<?php echo $totalBookSetPersent;?>%;}
		}
		.anianimationM{
			animation:5s progress1M normal;
		}
		@keyframes progress1M{
			0%{width:100%;}
			100%{width:<?php echo $neeededBookSetPersent;?>%;}
		}
		
			</style>
			<div class="col-md-12  w3-animate-left">
				<div class="thumbnail totalBooks "> 	<h4>Book info with persent</h4>							
					<div class="bg-info">
						<p>book's info</p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped progress-bar-success text-right anianimation" style='width:<?php echo $totalBookSetPersent;?>%;'>
							</div>
							<div class="progress-bar progress-bar-striped progress-bar-danger text-right anianimationM" style='width:<?php echo $neeededBookSetPersent;?>%;'>
							</div>
						</div>
						<p>Library info</p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped progress-bar-success text-right active" style='width:<?php echo $totalStoredBookPersent;?>%;'>
							</div>
							<div class="progress-bar progress-bar-striped progress-bar-danger text-right active" style='width:<?php echo $totalGivenBookPersent;?>%;'>
							</div>
						</div>
						<p>Total book Set: <?php echo $totalBookSetPersent."%";?></p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped text-right active" style='width:<?php echo $totalBookSetPersent;?>%;'>
							</div>
						</div>
						<p>Needed book Set: <?php echo $neeededBookSetPersent."%";?></p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped progress-bar-danger text-right active" style='width:<?php echo $neeededBookSetPersent;?>%;'>
							</div>
						</div>
						<p>stored books: <?php echo $totalStoredBookPersent;?>%</p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped active text-right" style='width:<?php echo $totalStoredBookPersent;?>%;'>
								
							</div>
						</div>
						<p>Given books: <?php echo $totalGivenBookPersent;?>%</p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped progress-bar-danger active text-right" style='width:<?php echo $totalGivenBookPersent;?>%;'>
								
							</div>
						</div>						
						<p></p>
					</div>
				</div>
			</div>
			<div class="col-md-4  w3-animate-bottom">
				<div class="thumbnail totalBooks "> 	<h4>Student's info</h4>									
					<div class="bg-info" > 
						<p>Total student: <?php echo $totalStudent; ?></p>
						<!-- <p>Total student persent: <?php echo $totalStudentPersent; ?>%</p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped text-right anianimation" style='width:<?php echo $totalStudentPersent; ?>%;'>
							</div>
						</div> -->
						<p></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row text-center">
			<h2>User info</h2>
		</div>
		<div class="row"> 					
			<div class="col-md-8 ">
				<div class="thumbnail totalBooks "> 									
					<div class="bg-info" > 
						<p>User info</p>
						<p>level-1: <?php echo $ActiveUsrLbl1Persent;?>%</p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped active progress-bar-info" style="width:<?php echo $ActiveUsrLbl1Persent;?>%;"></div>
						</div>
						<p>level-2: <?php echo $ActiveUsrLbl2Persent;?>%</p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped active progress-bar-success" style="width:<?php echo $ActiveUsrLbl2Persent;?>%;"></div>
						</div>
						<p>level-3: <?php echo $ActiveUsrLbl3Persent;?>%</p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped active progress-bar-primary" style="width:<?php echo $ActiveUsrLbl3Persent;?>%;"></div>
						</div>
						<p>others: <?php echo $ActiveUsrLbl0Persent;?>%</p>
						<div class="progress">
							<div class="progress-bar progress-bar-striped active progress-bar-danger" style="width:<?php echo $ActiveUsrLbl0Persent;?>%;"></div>
						</div>
						<div class="progress">
							<div class="progress-bar progress-bar-striped progress-bar-danger active" style='width:<?php echo $ActiveUsrLbl0Persent;?>%'>
								<b class="text-left">others</b>
							</div><div class="progress-bar progress-bar-striped progress-bar-primary active" style='width:<?php echo $ActiveUsrLbl3Persent;?>%'>
								<b class="text-left">level-3</b>
							</div>
							<div class="progress-bar progress-bar-striped progress-bar-success  active" style='width:<?php echo $ActiveUsrLbl2Persent;?>%;'>
								<b class="text-right">level-2</b>
							</div>
							<div class="progress-bar progress-bar-striped progress-bar-info  active" style='width:<?php echo $ActiveUsrLbl1Persent;?>%;'>
								<b class="text-right">level-1</b>
							</div>
						</div>
					</div>
				</div>
			</div>					
			<div class="col-md-4 ">
				<div class="thumbnail totalBooks "> 									
					<div class="bg-info" > 
							<p><b>User info</b></p>
							<div>Total: <span class="badge"><?php echo $calculateTtlUsr;?></span></div> 
							<div>active: <span class="badge"><?php echo $calculateActiveUsr;?></span></div> 
							<div>deactive: <span class="badge"><?php echo $calculateDeactiveUsr;?></span></div> 
							<div>level-1: <span class="badge"><?php echo $ActiveUsrLbl1;?></span></div> 
							<div>level-2: <span class="badge"><?php echo $ActiveUsrLbl2;?></span></div> 
							<div>level-3: <span class="badge"><?php echo $ActiveUsrLbl3;?></span></div> 
							<div>others: <span class="badge"><?php echo $ActiveUsrLbl0;?></span></div> 
							<br />
							<p class="text-left">Active: <?php echo $activeUserPersent;?>%</p>
							<div class="progress" style="float:none"> 
								<div class="progress-bar progress-bar-striped progress-bar-success active" style="width:<?php echo $activeUserPersent;?>%;"></div>
							</div>
							<p class="text-left">Dective: <?php echo $deactiveUserPersent;?>%</p>
							<div class="progress" style="float:none"> 
								<div class="progress-bar progress-bar-striped progress-bar-danger active" style="width:<?php echo $deactiveUserPersent;?>%;"></div>
							</div>
						<div class="progress">
							<div class="progress-bar progress-bar-striped progress-bar-success active " style='width:<?php echo $activeUserPersent;?>%;'>
								<b>Active</b>
							</div>
							<div class="progress-bar progress-bar-striped progress-bar-danger active " style='width:<?php echo $deactiveUserPersent;?>%;'>
								<b>Deactive</b>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<div class="row">	
	</div>
	<div class="row"> 	
	</div>
</div>
