<?php
if (!isset($_SESSION["logged"]))
{
    header("location: ?page=login");
}
if (isset($_POST['edit']) && $_POST['edit'] === 'Edit') {

    $errorMsgs = $user->validateUpdate($_POST);
    if (empty($errorMsgs)) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $naam = $_POST['naam'];
        $adres = $_POST['adres'];
        $postcode = $_POST['postcode'];
        $plaats = $_POST['plaats'];
        $tel = $_POST['tel'];
        $rek = $_POST['rek'];
        $id = $_POST['userid'];
    $user->updateProfile($username,$email,$naam,$adres,$postcode,$plaats,$tel,$rek,$id);
    echo '<div class="alert alert-success"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>You have succesfully updated your profile <a href="?page=index"<legend>Back to homepage</legend></a></div>';
    exit;
    }
    foreach ($errorMsgs as $msg) {
        echo '<li>'. $msg. '</li>';
    }
}


      while ($row = mysqli_fetch_assoc($result)) {
    ?>  <br><br><br><br>
    	<div class="container">
			<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
			<input type="hidden" class="form-control" name="userid" value="<?php echo $row['userid']; ?>" />
			Username<br>
 			<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" /><br>
 			Email<br>
 			<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" /><br>
			Naam<br>
			<input type="text" class="form-control" name="naam" value="<?php echo $row['naam']; ?>" /><br>
			Adres<br>
			<input type="text" class="form-control" name="adres" value="<?php echo $row['adres']; ?>" /><br>
			Postcode<br>
			<input type="text" class="form-control" name="postcode" value="<?php echo $row['postcode']; ?>" /><br>
			Plaats<br>
			<input type="text" class="form-control" name="plaats" value="<?php echo $row['plaats']; ?>" /><br>
			Telefoonnummer<br>
			<input type="text" class="form-control" name="tel" value="<?php echo $row['tel']; ?>" /><br>
			Rekeningnummer<br>
			<input type="text" class="form-control" name="rek" value="<?php echo $row['rekeningnummer']; ?>" /><br>
			<input name="edit" type="submit" value="Edit" class="btn btn-info"/>
			</form>
		</div>
 <?php }
 include $basePath . '/templates/nav.php';
        ?>