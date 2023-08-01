<?php
	session_start();
//        include_once 'class/books.php';
//        $objBooks=new books();
//        $booksinf=$objBooks->booksInfo();
//        //echo $booksinf['book_image'];
//        if(isset($booksinf)){
//            print_r($booksinf);
//        }
	include 'class/admin.php';
	$objAdmin=new admin();
	$result=$objAdmin->booksInfo();
?>

<!--zahid-->
<html>
    <!--Head section-->
    <head>
        <title>IBIT Books</title>
        <link rel="icon" href="assets/frontend/img/favicon.ico" />
        <link rel="stylesheet" href="assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/frontend/w3css/w3.css" />
        <link rel="stylesheet" href="assets/frontend/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="assets/frontend/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/frontend/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>  
    <!--style section-->  
    <style>

        .container-fluid{
            padding-top:70px;
            padding-bottom:70px;
        }
        .navbar {
            background:black;
            padding-top: 15px;
            padding-bottom: 15px;
            border: 0;
            border-radius: 0;
            margin-bottom: 0;
            font-size: 12px;
            font-weidth:bold;
            letter-spacing: 1px;			
        }

        .navbar-nav li a:hover {
           // color: tomato !important;
        }
        .bg-1{
            background:black;
            background-image:url('assets/frontend/img/bg/cloud.png'), url('assets/frontend/img/bg/library-bg-2.jpg');	
            background-repeat:repeat-x, no-repeat;
            background-size:contain, cover;
            background-attachment:local, fixed;
            background-position: center bottom, center bottom; 
            //color:#00F51C;
			color:white;
            font-weidth:bold;
            font-family:Eras Bold ITC;
        }
        .bg-1 .text{
            opacity: 0.5;
        }
        .bg-1 .text:hover{
            opacity: 0.8;
        }
        .bg-1:hover{					
            background-image:url('assets/frontend/img/bg/cloud.png'), url('assets/frontend/img/bg/bg1.jpg');	
            background-repeat:repeat-x, no-repeat;
            background-size:contain, cover;
            background-attachment:local, fixed;
            background-position: center bottom, center bottom; 
        }        
        .bg-2{
            background:#6A5ACD;
            color:#FFFFFF;			
            background-image:url('assets/frontend/img/bg/section-bg-1.png'), url('assets/frontend/img/bg/library-bg-2.jpg');	
            background-repeat:no-repeat, no-repeat;
            background-size:100% 100%, cover;
            background-attachment:local, fixed;
            background-position: left top, center; 
            width:100%;
            //min-height:auto;
            min-height: 400px;
        }
        .bg-3{
            background: #6A5ACD;
            color:#843030;
            font-weight: bold;
            background-image: url('assets/frontend/img/bg/section-bg-2.png');
            background-size: cover;
            background-position: left top;
            width: 100%;
            min-height: 400px;
        }
        .bg-4{
            background: #6A5ACD;
            color:#843030;
            font-weight: bold;
            background-image: url('assets/frontend/img/bg/section-bg-3.png');
            background-size: cover;
            background-position: left top;
            width: 100%;
            min-height: 400px;            
        }
        .bg-library{
            background-color: #6A5ACD;
        }
        .bg-library .thumbnail{
            background-color:#8C79D7 ;
        }
        .bg-library a{
            color:white;
            font-weight: bold;
        }
        .bg-library img{
            width: 90%;
        }
        .bg-footer{
            background:black;
            color:#FFFFFF;
        }
		
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      animation-duration: 2s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
    </style>    
    <!--body section-->
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <!--nav section-->
        <nav class="navbar navbar-inverse" style="position:sticky; top:0; z-index:99;" >
            <div class="container">
                <!--nav header-->
                <div class="navbar-header">
                    <div class="navbar-brand w3-animate-left"> <!-- <span class="glyphicon glyphicon-globe"></span> --> &#127759Library Management System</div>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>			  
                </div>
                <div class="collapse navbar-collapse w3-animate-right" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right"> 
                        <li><a href=""><!-- <span class="glyphicon glyphicon-home"></span> -->&#127969Home</a></li>
                        <li><a href="#notice"><!-- <span class="glyphicon glyphicon-bell"></span> -->&#128276Notice</a></li>
                        <li class='dropdown'>
                            <a data-toggle="dropdown" href="#"><!--<span class="glyphicon glyphicon-book"></span>-->&#128218Books <span class="caret"></span> 
                                <ul class="dropdown-menu"> 
                                    <li><a href="#library">Library</a></li>									
									<?php
										if(isset($_SESSION['userName']))
									{
									?>	
                                    <li><a   href="admin/givenBook.php">জমা</a></li>
                                    <li><a href="bookForm/index.php?getBook=getBook">নেওয়া</a></li>
									<?php
									}
									?>
                                </ul>
                            </a>
                        </li>
						<!--
						<li><a href="#"> <span class="glyphicon glyphicon-search"></span></a></li>
						-->
						<li><a href="#search"><!-- <span class="glyphicon glyphicon-search"></span> -->&#128269Search</a></li>
						<?php
							if(isset($_SESSION['userName'])){
						?>	
                        <li>
                            <a data-toggle="dropdown" href="">
                                <!-- <img class="img-circle"  src="<?php echo $_SESSION['userImage'];?>" style="" height="25px" width="25px"></img> -->
								
								<div style=' float:left; background:white; border-radius:50%; width:25px; height:25px; overflow:hidden;'>
									<img src="<?php echo $_SESSION['userImage'];?>" class='img img-responsive' style='width:25px;'></img>
								</div>
                                <span style="margin-top:35%;" class="caret"></span> 
                                <ul class="dropdown-menu"> 
                                    <li><a class='btn btn-success'><b> <?php echo $_SESSION['userName'];?> </b></a></li>   
                                    <li><a href="admin/"> Dashboard </a></li>   
									<li><a href="admin/adminProfile.php">Profile</a></li>
									<li><a href="admin/dashboard.php?logout=logout">log out</a></li>
                                </ul>
                            </a>
                        </li>
						<?php
							}
							else{
						?>
                        <li><a href="admin/"><!-- <span class="glyphicon glyphicon-user"></span> -->&#9997Login</a></li>
						<?php
						}
						?>
                        
                    </ul>
                </div>
            </div>
        </nav>	
<!--header section-->
<!-- bg 1-->
        <div class="container-fluid text-center bg-1"> 
            <div class="row">
                <div class="col-sm-12"> 
                    <!--
                    <img src="assets/frontend/img/favicon.ico" height='100' alt="" />	
                    -->
                    <div class='text w3-animate-zoom' style='background: #6A5ACD; float: none;  overflow: visible; border-radius: 15px; position: relative;'>
                        <h1 style='font-size:80px; opacity: 1; ' class=''>Library Management System</h1>
                        <address>only for IBIT Campas</address>
                    </div>
                </div>			
            </div>			
        </div>
<!--About section-->
<!-- bg 2-->        
        <div class="container-fluid text-left bg-2" id='about'> 
            <div class="row">	
                <div class="col-md-1"></div>
                <div class="col-md-2 w3-animate-right"> 
                    <p> 
                        পড়ো তোমার প্রভুর নামে

                    </p>	
                    <p> 
                        যিনি সৃষ্টি করেছেন তোমাকে

                    </p> 
					<p id="notice"></p>
					<p id="search"></p>
                </div>
                <div class="col-md-6"> 
                </div>
                <div class="col-md-3"> 
                </div>
            </div>
        </div>

<!--Books library Gallery-->
        <div id='library' class="contaniner">			
            <div class="row bg-library"> 
				<div class="row"> 
					<div class="col-sm-12"> 
						<div > 
							<marquee style="color:white;">
								<b>আগামী ১/২/২০২০ তারিখের ভিতরে পুরাতন বই জমা দিতে হবে।</b>
								<b>আগামী ২০/২/২০২০ তারিখের ভিতরে নতুন বই নিতে হবে।</b>
							</marquee>
						</div>
					</div>
				</div>
				<div class="row text-center"> 
					<div class="col-sm-8"></div>
					<div class="col-sm-4">
						
						<div class="input-group">
							<div class="btn btn-lg bnt-primary"><input id="myInput" style="border-radius:15px;" placeholder="search..." type="search" /></div>
						</div>
					</div>
				</div>
				<div style="margin:10px;" id="myDIV"> 
					<div class="row">					
						<?php
							//set row
							$setRow=0;
							while($row = mysqli_fetch_assoc($result)) {
								$setRow++;
								?> 
										<div class="col-md-3 text-center slideanim">
											 <div  class="thumbnail">
													 <a href="<?php echo $row['book_image']; ?>" target="_blank">
															 <img style="height:200px; width:auto;" src="<?php echo $row['book_image']; ?>">
													 </a>
													 <a href="bookForm/index.php?getBook=getBook&bookCode=<?php echo $row['book_code']; ?>&bookName=<?php echo $row['book_name']; ?>" >
															 <p><?php echo $row['book_code']; ?></p>
															 <p><?php echo $row['book_name']; ?></p>
															 <p>
															 Avaible
															 <span class="badge"><?php echo $row['book_stored']; ?></span>
															 Total
															 <span class="badge"><?php echo $row['book_total']; ?></span>
															 </p>
															 <div class="btn btn-info">Get</div>
													 </a>
											 </div>
										 </div>
									<?php
										if($setRow%4==0){
											?>
					</div><div class="row"> 
											<?php
										}
									?>
									<?php
							}

						//$conn->close(); 
						 ?>					
					</div>
				</div>
			</div>
		</div>

        <!--footer-->
        <footer class="container-fluid text-center bg-footer"> 

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 text-left w3-animate-left">
					<p>
						devoloped by <b class="text-default"><a href="assets/backend/img/developer/1.jpg" target="_blank">Zahid Hasan</a></b>
					</p>
                </div>
                <div class="col-sm-2 text-left w3-animate-right">
					<h4 class="text-default" style="text-decoration:underline; color:tomato;">Team member</h4>
					<address> 
						<p class="text-success">Zahid hasan</p>
						<p class="text-success">Abu raihan</p>
						<p class="text-success">Safi uddin sanim</p>
						<p class="text-danger">Nazir ahommed</p>
						<p class="text-danger">Torikul islam</p>
					</address>
                </div>
                <div class="col-sm-4 text-right w3-animate-right">
                    <p>Copywrite <a class="text-info" href="copy.txt" target='_blank'>&copyIBIT</a> 2019</p>
                </div>
            </div>

        </footer>
    </body>
	
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
	
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</html>