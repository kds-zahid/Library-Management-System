<?php 
    session_start();
	if(isset($_SESSION['userName'])){
		//logout
		include_once '../class/admin.php';
		$onjAdmin=new Admin();		
		if(isset($_GET['logout'])){
			$onjAdmin->logout();
		}
		//Book object
		include_once "../class/book.php";
		$book=new book();
			//upload book 
		if(isset($_POST['upload'])){		
		$book->insertBookinfo($_POST);
		}
			//delete book 
		if(isset($_GET['delete'])){
			$deletId=$_GET['deletId'];
			$book->deletebook($deletId);
		}			
		
?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="icon" href="../assets/frontend/img/favicon.ico" />
	<link rel="stylesheet" href="../assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="../assets/frontend/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		*{
			margin:0;
		}
		.master{
			border:1px;
			width:100%; 
			height:100%;
		}
		.menu{
			width:		150px;
			min-width:	150px;
			max-width:	150px;
			background:black;
			color:white;
			//text-align:center;
			//margin-top:0;
		}
		//
		.menu div.btn-info a{
			color:white;
			text-decoration:none;
		}
		.menu a:hover{
		}
		.menu div.btn-info{
			background:#3A3A3A;
		}
		.menu div.btn-info:hover{
			background:#5BC0DE;
			color:white;
		}
		.menu div.btn-info:active{
			background:white;
			color:black;
		}
		//
		#books .totalBooks{
			padding:5px;
			border-radius:5px;
			border:1px solid black;
		}
		.anianimation{
			animation:5s progress1 normal;
		}
		@keyframes progress1{
			0%{width:0%;}
			100%{width:70%;}
		}
		.anianimationM{
			animation:5s progress1M normal;
		}
		@keyframes progress1M{
			0%{width:100%;}
			100%{width:30%;}
		}
	</style>
</head>
<body>
	<table class='master' >
		<tr>
			<td class="menu">
				<!-- 
				<div class="container-fluid" style="margin-top:0;">
					<div class='btn-lg'></div>		
						-->
				<div class="menuDiv" style=' text-align:center; position: sticky; top:0; bottom:0; margin-top:0;'>
					<img class="img-circle text-left" src="../<?php echo $_SESSION['userImage'];?>" style="" height="85px" width="85px"></img>
					<h3>			
						<div class="dropdown">
								<i class="halflings-icon white user"></i> 
								<?php
								echo $_SESSION['userName'];
								?>
							<a style='color:white;' class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="">profile</a></li>
								<li><a href="<?php echo 'dashboard.php?logout=logout' ?>" type='submit' name='logout'><i class="halflings-icon off"></i> Logout</a></li>									
							</ul>
						</div>
					</h3>
					<!--
					<div class='btn-lg'></div>
					<div class="btn-lg btn-info dropdown"> 
									<a data-toggle="dropdown" href="#">Book <span class="caret"></span> 
										<ul class="dropdown-menu"> 
											<li><a data-toggle="tab" href="#addBook">Add book</a></li>	
											<li><a  data-toggle="tab"  href="#manageBook">Manage book</a></li>	
										</ul>
									</a>
					</div>
					<div class='btn-lg'></div>
					<div class="btn-lg btn-info dropdown"> 
									<a data-toggle="dropdown" href="#">Student <span class="caret"></span> 
										<ul class="dropdown-menu"> 
											<li><a data-toggle="tab" href="#addStudent">Add student</a></li>	
											<li><a data-toggle="tab"  href="#manageStudent">Manage student</a></li>	
										</ul>
									</a>
					</div>
					<div class='btn-lg'></div>
					<div class="btn-lg btn-info dropdown"> 
									<a data-toggle="dropdown" href="#">user <span class="caret"></span> 
										<ul class="dropdown-menu"> 
											<li class="disabled"><a data-toggle="tab" href="">Add user</a></li>	
											<li><a data-toggle="tab"  href="#manageUser">Manage user</a></li>	
										</ul>
									</a>
					</div>
				</div>
				-->
				<div>
					<style type="text/css"> 
					
						#fullMenu{
							background:#3A3A3A;
							border:1px solid black;
							margin:0;
						}	
						#pMenu{
							background:#222222;
							color:white;
							font-weight:900;
							cursor:normal;
						}		
						#pMenu .headmenu{
							cursor:grab;
						}	
						#pMenu .headmenu:active{
							cursor:grabbing;
						}		
						#pMenu:hover{
							background:white;
							//color:#31B0D5;
							color:tomato;
							font-weight:900;
						}		
						.collapse12 .li{
							text-align:right;
							padding:5px;
						}			
						.collapse12 .li:hover{
							background:black;
							color:black;
						}
						.collapse12 a{
							color:tomato;
							font-weight:bold;
						}	
						.collapse12 .li:hover a{
							color:#31B0D5;
							text-decoration:none;
						}
						.collapse12 .li a:focus{
							color:#31B0D5;
							text-decoration:none;
						}
						.disabledC{ 
							cursor:no-drop;
						}
						.D_body{
							overflow-y: scroll;
						}
					</style>
					
					<div class="panel panel-default" id="fullMenu"> 
						<div class="panel-heading pMenu" id="pMenu" style="">						
								<div class="headmenu" data-toggle='collapse' data-target='#collapseBooks' >Books</div>
						</div>
							<div id="collapseBooks" class="collapse12 panel-collapse collapse">
								
								<div class="li"> 
									<a  href="addBook.php">Add book</a>
								</div>
								<div class="li"> 
									<a href="manageBook.php">Manage book</a>
								</div>
							</div>
					</div>	
					<div class="panel panel-default" id="fullMenu"> 
						<div class="panel-heading bg-danger pMenu" id="pMenu" style="">						
								<div class="headmenu" data-toggle='collapse' data-target='#collapseStudent' >Student</div>
						</div>
							<div id="collapseStudent" class="collapse12 panel-collapse collapse">
								
								<div class="li"> 
									<a href="addStudent.php">Add student</a>
								</div>
								<div class="li"> 
									<a href="manageStudent.php">Manage student</a>
								</div>
							</div>
					</div>	
					<div class="panel panel-default" id="fullMenu"> 
						<div class="panel-heading bg-danger pMenu" id="pMenu" style="">						
								<div class="headmenu" data-toggle='collapse' data-target='#collapseUser' >User</div>
						</div>
							<div id="collapseUser" class="collapse12 panel-collapse collapse">
								
								<!-- <div class="li"> 
									<a class="disabledC" data-toggle="tab" href="#">Add user</a>
								</div> -->
								<div class="li"> 
									<a   href="manageUser.php">Manage user</a>
								</div>
							</div>
					</div>
				</div>
				</div>
			</td>
			<td class='D_body'>
				<div class="container-fluid">
					<div class="row"> 
						<ul class="breadcrumb"> 
							<li><a href="dashboard.php">Dashboard</a></li>
							<?php 
							if(isset($D_breadcrumb)){
									?>
									<li>
									<?php 
										echo $D_breadcrumb;
									?>
									</li>
									<?php
								}
								else{}
							?>
						</ul>
					</div>
					<div class="row">
							<?php 
								if(isset($D_page)){
									include_once $D_page;
									//echo $D_page;
									//echo 'page link';
								}
								else{
									include_once 'D_default.php';
								}
							?>
						<!-- <div class="tab-content"> 
						<div id="addBook"  class="tab-pane fade">
							
						</div>
						<div id="manageBook"  class="tab-pane fade">
						
						</div>
						
						
						<div id='addStudent' class="tab-pane fade" style=""> 		
							
						</div>
						
						<div id="manageStudent"  class="tab-pane fade">				
							
						</div>
						<div id="addUser"  class="tab-pane fade">
							add user
						</div>
						<div id="manageUser"  class="tab-pane fade">							
							
						</div>
						
											</div> -->
					</div>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>

<?php
	}
	else{
		header("location:index.php");
	}
?>