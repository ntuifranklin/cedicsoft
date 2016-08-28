<?php
/**
  * This is login page.
  *
  *
  * * Markdown style lists function too
  * * Just try this out once
  *
  * The section after the description contains the tags; which provide
  * structured meta-data concerning the given element.
  *
  * @author  Franklin Nkokam Ngongang <franklin.nkokam.ngongang@gmail.com>
  *
  * @since 1.0
  *
  * @param int    $example  This is an example function/method parameter description.
  * @param string $example2 This is a second example.
  */
  $thisfile = htmlspecialchars($_SERVER["PHP_SELF"]) ;/* Avoid Self exploits */
  error_reporting(E_ERROR | E_WARNING | E_PARSE);//Report simple running errors
  include_once("mboutman.inc.php");
  if(! $_POST["loginform"]){//If we are not coming from the login form then run this part of the code
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  
		if(  ip_is_local($_SERVER["SERVER_ADDR"]) ){//We are on a local machine so we may not have access to internet 
	    $servermessage = '<div class="alert alert-warning">
				  <strong>Yaayyy !! Local server </strong> 
				</div>';
  ?>
		  <link rel="stylesheet" href="./mini/css/bootstrap.min.css">
		  <script src="./mini/js/jquery.min.js"></script>
		  <script src="./mini/js/bootstrap.min.js"></script>
		  
  
  <?php 
		}else{//We are on the internet so we can include the bootsrap online
			$servermessage = '<div class="alert alert-warning">
				  <strong>We are either online or we are using IPV6 online buddy ! </strong> 
				</div>';
	?>		
		  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		    
			
	<?php		
		}
		
  
  ?>
  <LINK REL="CEDIC SA"  HREF="./logo/petitc.png">
				<style>		
								
				* {
					box-sizing: border-box;
				}
				.row::after {
					content: "";
					clear: both;
					display: block;
				}
				[class*="col-"] {
					float: left;
					padding: 15px;
				}
				html {
					font-family: "Lucida Sans", sans-serif;
				}
				.header {
					background-color: #9933cc;
					color: #ffffff;
					padding: 15px;
				}
				.menu ul {
					list-style-type: none;
					margin: 0;
					padding: 0;
				}
				.menu li {
					padding: 8px;
					margin-bottom: 7px;
					background-color :#33b5e5;
					color: #ffffff;
					box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
				}
				.menu li:hover {
					background-color: #0099cc;
				}
				.aside {
					background-color: #33b5e5;
					padding: 15px;
					color: #ffffff;
					text-align: center;
					font-size: 14px;
					box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
				}
				.footer {
					background-color: #0099cc;
					color: #ffffff;
					text-align: center;
					font-size: 12px;
					padding: 15px;
				}
				/* For mobile phones: */
				[class*="col-"] {
					width: 100%;
				}
				@media only screen and (min-width: 768px) {
					/* For desktop: */
					.col-1 {width: 8.33%;}
					.col-2 {width: 16.66%;}
					.col-3 {width: 25%;}
					.col-4 {width: 33.33%;}
					.col-5 {width: 41.66%;}
					.col-6 {width: 50%;}
					.col-7 {width: 58.33%;}
					.col-8 {width: 66.66%;}
					.col-9 {width: 75%;}
					.col-10 {width: 83.33%;}
					.col-11 {width: 91.66%;}
					.col-12 {width: 100%;}
				}
				
				.loginform{
					
					display: inline-block;
					width: 40%;
					height: 80%;
					position: absolute;
					margin: 10% 10% 10% 10%;
					top: 50%;
					left: 50%;
					/* bring your own prefixes */
					transform: translate(-66%, -66%);
					color: #1aa3ff;
					overflow-x: h; /* Hide horizontal scrollbar */
					overflow-y: hidden; /* Hide vertical scrollbar */
				} 
						
						
				
				.logologin{

					display: block;
					margin: auto;
					width: 15%;	 
					border-radius: 5px;
				}
				</style>
</head>
<body>

<?php

	echo $servermessage;;
?>
	
	  <div class="loginform">
		  <img src="./logo/grandcedic.gif" class="logologin img-responsive img-thumbnail" alt="CEDIC SA">
	  <center><h2>Sign in to Cedicsoft</h2></center>
			 <form class="form-signin" name="loginform" id="logform" type="POST" action="<?php echo $thisfile;?>" autocomplete="off">
			  <div >
				 <span class="glyphicon glyphicon-user"></span>
				 
				<label for="useremail">Username or Email address</label>
				<input name="useremail" type="user" autocapitalize="off" autocorrect="off" autofocus="autofocus" class="form-control input-lg" id="useremail" value="" Placeholder="Type in Your Username or Email address">
			  </div>
			
			  <input type="hidden" name="logincounter" value="">
			  <div >
				  
				 <span class="glyphicon glyphicon-lock"></span>
				<label for="pwd">Password:</label>
				<input type="password" class="form-control input-lg" id="pwd" value="" Placeholder="Type in Your password">
			  </div>
			  
			 <div>
				 <label for="sublogform"></label>
				 <input name="sublogform" type="submit" value="L o g i n" class="btn btn-lg btn-primary btn-block"/>
			  </div>
			 
			 <div>
				<!--  <label for="resetpass"></label>
				 <input name="resetpass" type="submit" value="L o g i n" class="btn btn-lg btn-primary btn-block"/>
				 -->
			  </div>
			</form>
	
	  </div>

<?php
}else{//Deal with the data that comes from the form
	
	
	
}
?>

</body>
</html>
