<?php 
include $basePath . '/templates/nav.php';
		$resModel = new User();
		$resModel->delete(isset($_GET['id']) ? $_GET['id'] : 0);
		$selectAll = $resModel->getallBookings();
		
		$log->protect_page();
		$log->checkAdmin();
?>
<br><br><br><br>
<div class="container">
    <div class="row">
    <div class="col-xs-12">
    <table class="table">
    <thead>
    <tr>
    <th style="width:100px;">Accomodatie</th>
    <th style="width:100px;">Aantal personen</th>
    <th style="width:100px;">Reservatie van:</th>
    <th style="width:100px;">Reservatie tot:</th>
    <th style="width:130px; text-align: center">Delete</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    </tr>
    <?php
    foreach($selectAll as $reservation){
        echo "<tr>";

     echo "<th>";
     echo $reservation['accomodatie'];
     echo "</th>";

        echo "<td>";
        echo $reservation['personen'];
        echo "</td>";
        
	        echo "<td>";
	        echo $reservation['resvan'];
	        echo "</td>";
	        
		        echo "<td>";
		        echo $reservation['restot'];
		        echo "</td>";

			        echo "<td style='text-align: center'>";
			        echo "<a class='remove' href='?action=deletereservation&id=". $reservation['id'] . "'><i class=\"fa fa-trash\"></i></a>";
			        echo "</td>";
			
			        echo "</tr>";
   }
    ?>
    </tbody>
    </table>
    </div>
    </div>