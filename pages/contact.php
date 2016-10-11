<?php 
include $basePath . '/templates/nav.php';
?>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/form-elements.css">
<br><br><br>
<div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Divihotel</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Contact us</h3>
                            		<p>Fill in the form below to send us a message:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-envelope"></i>
                        		</div>
                            </div>
                            <div class="form-bottom contact-form">
			                    <form role="form" action="pages/sendmail.php" method="post">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="contact-email">Email</label>
			                        	<input type="text" name="email" placeholder="Email..." class="contact-email form-control" id="contact-email">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="contact-subject">Subject</label>
			                        	<input type="text" name="subject" placeholder="Subject..." class="contact-subject form-control" id="contact-subject">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="contact-message">Message</label>
			                        	<textarea name="message" placeholder="Message..." class="contact-message form-control" id="contact-message"></textarea>
			                        </div>
			                        <button type="submit" class="btn">Send message</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>