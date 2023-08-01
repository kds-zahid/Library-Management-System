<?php 
    session_start();
	if(isset($_SESSION['userName'])){
		//objAdmin
		include_once '../class/admin.php';
		$onjAdmin=new Admin();
		//log out 
		if(isset($_GET['logout'])){
			$onjAdmin->logout();
		}
			//upload book 
		if(isset($_POST['upload'])){		
			$onjAdmin->insertBookinfo($_POST);
		}
		//uploadStudent
		if(isset($_POST['uploadStudent'])){	
			$message=$onjAdmin->insertStudentinfo($_POST);
			
		}
			//update book 
		if(isset($_POST['UpdateBook'])){		
		$message=$onjAdmin->updateBookinfo($_POST);
		}
			//insert given book info
		if(isset($_POST['getBook'])){
			$message=$onjAdmin->insertGivenBookInfo($_POST);
		}
		// returnBook
		if(isset($_GET['returnBook'])){
			$ReturnId=$_GET['returnBook'];
			$roll=$_GET['searchRoll'];
			$subjectCode=$_GET['subjectCode'];
			$onjAdmin->ReturnBook($ReturnId,$roll,$subjectCode);
		}
		
		
		//update student info
		if(isset($_POST['updateStudent'])){	
			$message=$onjAdmin->UpdateStudentinfo($_POST);
			
		}
		// UPDATE user
		if(isset($_POST['userUpdate'])){
		$onjAdmin->updateUserInfo($_POST);
		}
		
		//delete book 
		if(isset($_GET['delete'])){
			$deletId=$_GET['deletId'];
			$message=$onjAdmin->deletebook($deletId);
		}			
			//delete student 
		if(isset($_GET['deleteStudent'])){
			$deleteStudentId=$_GET['deleteStudentId'];
			$onjAdmin->deleteStudent($deleteStudentId);
		}	
		
		// delete user
		if(isset($_GET['deleteUser'])){
			$deleteuserId=$_GET['deleteUser'];
			$message=$onjAdmin->deleteUser($deleteuserId);
		}	
		// user status		
		if(isset($_GET['stutus'])){
			if($_GET['stutus']=='deactive'){
				$id=$_GET['id'];
				$message=$onjAdmin->userDeactivate($id);
			}
			if($_GET['stutus']=='active'){
				$id=$_GET['id'];
				$message=$onjAdmin->userActivate($id);
			}
		}
		
?>
<html>
	<head>
		<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="icon" href="../assets/frontend/img/favicon.ico" />
	 <link rel="stylesheet" href="../assets/frontend/w3css/w3.css" />
	<link rel="stylesheet" href="../assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="../assets/frontend/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
<style type="text/css">
		*{
			margin:0;
		}

.body{ 
	float:left
	width:auto;
	height:100%;
	overflow-y:scroll;
}
		.menu{
	float:left;
	height:100%;
	overflow:auto;
	//width:200px;
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
	</style>
<div style="height:100%; width:100%;"> 
	<div class="menu">
		<div class="menuDiv" style=' text-align:center; position: sticky; top:0; bottom:0; margin-top:10px;'>
					<!-- <img class="img-circle text-left" src="../<?php echo $_SESSION['userImage'];?>" style="" height="85px" width="85px"></img> -->
					
					<a href="adminProfile.php">
						<div style='margin:auto; background:white; border:3px solid white; border-radius:50%; width:85px; height:85px; overflow:hidden;'>
							<img src="../<?php echo $_SESSION['userImage'];?>" class='img img-responsive' style='width:85px;'></img>
						</div>
					</a>
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
								<li><a href="adminProfile.php">profile</a></li>
								<li><a href="<?php echo 'dashboard.php?logout=logout' ?>" type='' name='logout'><i class="halflings-icon off"></i> Logout</a></li>									
							</ul>
						</div>
					</h3>
					
				<div>
					<style type="text/css"> 
					
						#fullMenu{
							background:#3A3A3A;
							border:1px solid black;
							margin:0;
							cursor:grab;
						}
						#fullMenu:active{
							cursor:grabbing;
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
							text-align:left;
							padding:5px;
						}		
						.collapse12 .li:before {
							content: "⭕";
						}		
						.collapse12 .li:after {
							//content: "❤⏺▶▶⚪⚫◽◾◼";
						}			
						.collapse12 .li:hover{
							background:black;
							color:#31B0D5;
						}
						.collapse12 a{
							color:tomato;
							font-weight:bold;
						}	
						.collapse12 a:hover{
							color:#31B0D5;
							text-decoration:none;
						}
						.collapse12 a:focus{
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
					
					<div class="panel panel-default" id="fullMenu" data-toggle='collapse' data-target='#collapseBooks'> 
						<div class="panel-heading pMenu" id="pMenu" style="">						
								<div class="headmenu"  >Books</div>
						</div>
							<div id="collapseBooks" class="collapse12 panel-collapse collapse <?php if(isset($activeMenu)){ if($activeMenu=="book"){ echo 'in';}} ?>">
								<a class="<?php if($_SESSION['userLevel']==3 || $_SESSION['userLevel']==0){ echo 'btn disabled';} ?>" href="addBook.php">
									<div class="li "> 
										 Add book <!-- &#9508 -->
									</div>
								</a>
								<a href="manageBook.php">
									<div class="li">
										Manage book <!-- &#9508 -->
									</div>
								</a>
								
								<!-- <a href="../bookForm/index.php?getBook=getBook">
									<div class="li">
										Get book &#9508
									</div>
								</a> -->
								<a href="getBook.php?getBook=getBook">
									<div class="li">
										Get book
									</div>
								</a>
								<a href="givenBook.php">
									<div class="li">
										Given book <!-- &#9508 -->
									</div>
								</a>
							</div>
					</div>	
					<div class="panel panel-default" id="fullMenu" data-toggle='collapse' data-target='#collapseStudent' > 
						<div class="panel-heading bg-danger pMenu" id="pMenu" style="">						
								<div class="headmenu" >Student</div>
						</div>
							<div id="collapseStudent" class="collapse12 panel-collapse collapse <?php if(isset($activeMenu)){ if($activeMenu=="student"){ echo 'in';}} ?>">
								
								<a class="<?php if($_SESSION['userLevel']==3 || $_SESSION['userLevel']==0){ echo 'btn disabled';} ?>" href="addStudent.php">
									<div class="li"> 
										Add student
									</div>
								</a>
								<a href="manageStudent.php">
									<div class="li">
										Manage student
									</div>
								</a>
							</div>
					</div>	
					<div class="panel panel-default" id="fullMenu"  data-toggle='collapse' data-target='#collapseUser' > 
						<div class="panel-heading bg-danger pMenu" id="pMenu" style="">						
								<div class="headmenu">User</div>
						</div>
							<div id="collapseUser" class="collapse12 panel-collapse collapse <?php if(isset($activeMenu)){ if($activeMenu=="user"){ echo 'in';}} ?>">
								
								<!-- <div class="li"> 
									<a class="disabledC" data-toggle="tab" href="#">Add user</a>
								</div> -->
								<a   href="manageUser.php">
									<div class="li">
										Manage user
									</div>
								</a>
							</div>
					</div>
				</div>
				</div>
	
	</div>
	<div class="body">
		<div class="container-fluid">
					<div class="row" style="position:sticky; top:0; z-index:3;"> 
						<ul class="breadcrumb"> 
							<li><a href="../">Home</a></li>
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
					
					</div>
				</div>
	</div>

</div>
</body>
</html>

<?php
	}
	else{
		header("location:index.php");
	}
?>