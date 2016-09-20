<?php 
include $basePath . '/templates/nav.php';


?>

<body class="login">
    	<div class="container" id="login-block">
    		<div class="row">
			    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			    	 
			       <div class="login-box clearfix animated flipInY">
			       		<div class="page-icon animated bounceInDown">
			       			<img class="img-responsive" src="img/login-key-icon.png" alt="Key icon" />
			       		</div>
			        	<div class="login-logo">
			        		<a href="#"><img src="img/divi.png" style="width: 150px; height: 100px;" alt="Company Logo" /></a>
        		        		<?php 
								   if(isset($_POST['login']))
								   {
								   	$login = new User();
								   	$login->Login();
								   }
								   ?>
			        	</div> 
			        	<hr />
			        	<div class="login-form">
			        		<div class="alert alert-error hide">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <h4>Error!</h4>
							</div>
			        		<form action="#" method="post"  >
						   		 <input type="text" placeholder="User name" class="input-field" name="username"/> 
						   		 <input type="password"  placeholder="Password" class="input-field" name="password"/> 
						   		 <button type="submit" class="btn btn-login" name="login">Login</button> 
							</form>	
							<div class="login-links"> 
					            <br />
					            <a href="?page=register">
					              Don't have an account? <strong>Sign Up</strong>
					            </a>
							</div>      		
			        	</div> 			    	
			       </div>
			    </div>
			</div>
    	</div>
    </body>