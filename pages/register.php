<?php
include $basePath . '/templates/nav.php';

$userModel = new User();

if (isset($_POST['reg']) && $_POST['reg'] === 'Sign-up') {
//     $register = new User();
    $errorMsgs = $userModel->validateRegister($_POST);
    if (empty($errorMsgs)) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $naam = $_POST['naam'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $plaats = $_POST['plaats'];
        $tel = $_POST['tel'];
        $rek = $_POST['rek'];
        
	    $userModel->Register($username, $email, $password, $naam, $adres, $postcode, $plaats, $tel,$rek);
	    
	    echo '<br><br><br>';
        echo '<div class="alert alert-success"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>You\'ve been registered successfully<br>Click <a href="?page=login">here</a> to go to the login page. </div>';
        exit;
    }
}
?>
<body class="register">
    	<div class="container" id="login-block">
    		<div class="row">
			    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			    	 
			       <div class="login-box clearfix animated flipInY">
			       		<div class="page-icon animated bounceInDown">
			       			<img class="img-responsive" src="img/login-key-icon.png" alt="Key icon" />
			       		</div>
			        	<div class="register-logo"><br>
			        		<a href="#"><img src="img/divi.png" style="width: 150px; height: 100px;" alt="Company Logo" /></a><br><br>
        		               <?php 
				               if (empty($_POST) === false ) {
				                  echo '<div class="alert alert-danger alert-dismissible registererrors" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button><li>' . implode('</li><li>', $errorMsgs) . '</li></div>';
				               }
				               ?>
			        	</div> 
			        	<hr />
			        	<div class="login-form">
			        		<div class="alert alert-error hide">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <h4>Error!</h4>
								   Your Error Message goes here
							</div>
			        		<form action="#" method="post">
						   		 <input type="text" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"/> 
						   		 <input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>"/>
						   		 <input type="text" name="naam" placeholder="Voornaam" value="<?php if(isset($_POST['naam'])) echo $_POST['naam'];?>"/>
						   		 <input type="text" name="adres" placeholder="Address" value="<?php if(isset($_POST['adres'])) echo $_POST['adres'];?>"/>
						   		 <input type="text" name="postcode" placeholder="postcode" value="<?php if(isset($_POST['postcode'])) echo $_POST['postcode'];?>"/>
						   		 <input type="text" name="plaats" placeholder="Woonplaats" value="<?php if(isset($_POST['plaats'])) echo $_POST['plaats'];?>"/>
						   		 <input type="tel" name="tel" placeholder="Tel-nummer" value="<?php if(isset($_POST['tel'])) echo $_POST['tel'];?>"/>
						   		 <input type="text" name="rek" placeholder="Rekeningnummer" value="<?php if(isset($_POST['rek'])) echo $_POST['rek'];?>"/>
   		 						 <input type="password" placeholder="Password" class="input-field" name="password"/> 	
						   		 <input type="password"  placeholder="Password-again" class="input-field" name="confirm_password"/> 
						   		 <button type="submit" class="btn btn-login" name="reg" value="Sign-up">Registreer</button> 
							</form>	
							<div class="login-links"> 
					            <br />
					            <a href="?page=login">
					              Already have an account? <strong>Login</strong>
					            </a>
							</div>      		
			        	</div> 			        	
			       </div>
			    </div>
			</div>
    	</div>
    </body>