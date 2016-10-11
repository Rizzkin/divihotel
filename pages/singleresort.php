<?php 
$houseModel = new Song();
$selectSingle = $houseModel->getOne($id);
$selectAll = $houseModel->getAll();

include $basePath . '/templates/nav.php';



$user = new Date();

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-*.min.js"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  

<div class='container-fluid'>
	<div class='row'>
		<div class='col-xs-12 nopadding'>
			<div class='banner ' style='background-image: url(<?php echo $selectSingle['imageurl'] ?>);'>
			</div>
			<div class="container">
			    <div class="row">
			    <div class="col-md-3">
			    </div>
			    <div class="col-md-6">
			    			<h3 class='headersingle border'><?php echo $selectSingle['house'] ?></h3>
			    </div>
			    <div class="col-md-3">
			    </div>
			    </div>
			    <div class="row">
			        <br>
			        <div class="col-md-3">
			    	</div>
			        <div class="col-md-6">
			            <p class="descborder border"><?php echo $selectSingle['description']; ?></p>
			        </div>
			        <div class="col-md-3">
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function () {
	    $("#resvan").datepicker({
	        minDate: "+2D",
	        changeMonth: true,
	        dateFormat: 'yy-mm-dd',
	        onClose: function (selectedDate, instance) {
	            if (selectedDate != '') {
	                $("#restot").datepicker("option", "minDate", selectedDate);
	                var date = $.datepicker.parseDate(instance.settings.dateFormat, selectedDate, instance.settings);
	                date.setMonth(date.getMonth() + 2);
	                console.log(selectedDate, date);
	                $("#restot").datepicker("option", "minDate", selectedDate);
	                $("#restot").datepicker("option", "maxDate", date);
	            }
	        }
	    });
	    $("#restot").datepicker({
	        minDate: "dateToday",
	        changeMonth: true,
	        dateFormat: 'yy-mm-dd',
	        onClose: function (selectedDate) {
	            $("#resvan").datepicker("option", "maxDate", selectedDate);
	        }
	    });
	});
</script>

<script>
    $(".readonly").keydown(function(e){
        e.preventDefault();
    });
</script>
<?php 
if(isset($_SESSION['logged'])){
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<div class="container">
  <table class="table table-bordered">
  
<tr>
<td>Naam</td>
<td><input type="text" name="naam"required/></td>
</tr>
<tr>
<td>Achternaam</td>
<td><input type="text" name="achternaam" required/></td>
</tr>
<tr>
<td>Postcode</td>
<td><input type="text" name="postcode" required/></td>
</tr>
<tr>
<td>Adres</td>
<td><input type="text" name="adres" required/></td>
</tr>

  
    <tr>
    <td>Aantal Personen</td><td>
<select name="personen">
<?php 

$i = 1;
while ( $i <= 12 ) {
   
   $selected = '';
   if(!empty($_POST['personen']) and $_POST['personen'] == $i) {
       $selected = ' selected="selected"';  
   }
   echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';

   $i++;
}
?>
</select>
</td>
<input type="hidden" name="house" value="<?php echo $selectSingle['house'] ?>"/>
	<tr>
	<td>Datum</td>
	<td>
<label for="from">From</label>
<input type="text" id="resvan" class="readonly" name="resvan" required/>
<label for="to">to</label>
<input type="text" id="restot" class="readonly" name="restot" required/>
<input name="res" type="submit" value="reserveer" class="btn"/>
</td>
</tr>

	</table>
	</div>
	</form>
	<?php 
	}
	if (isset($_POST['res']) && $_POST['res'] === 'reserveer') {
	    $personen = $_POST['personen'];
	    $resvan = $_POST['resvan'];
	    $restot = $_POST['restot'];
	    $naam = $_POST['naam'];
	    $house = $_POST['house'];
	    $achternaam = $_POST['achternaam'];
	    $postcode = $_POST['postcode'];
	    $adres = $_POST['adres'];
	    $userid = $_SESSION['userid'];
	    $errorMsgs = $user->check($resvan, $restot, $house);
	    if (empty($errorMsgs)) {
	        $user->reserveer($personen, $userid, $resvan, $restot, $naam, $house, $achternaam, $postcode, $adres);
	        echo '<div class="alert alert-success"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>You have succesfully made a reservation.</div>';
	        exit;
	    }
	    foreach ($errorMsgs as $msg) {
	        echo $msg;
	    }
	
	}
	
	?>
