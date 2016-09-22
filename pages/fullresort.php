<?php 
include $basePath . '/templates/nav.php';
		$songModel = new Song();
		$selectAll = $songModel->getAll();
?>

<br>
<br>
<br>
<div class="container-fluid">
<div class="row">
	</div>
	</div>
	<div class="btn-group btn-group-justified" role="group" aria-label="" style="margin-top: -9px;">
<!--		<a href='?action=home'>All</a>-->

	</div>
	<br>
	<br>
	<br>
	<br>
	<?php
	foreach ($selectAll as $house) {

            $image = $house['imageurl'];
            $id = $house['id'];
            $vhouse = $house['house'];

            echo "<a href='?action=viewhouse&id=$id'>";
            echo '<div class="col-xs-4">';
            echo '<h1 class="title">'.$house['house'];
            echo ' - '. $house['house'];
            echo "<div class='wrappercontent'style='"."background-image: url(".$image.");'>";

            echo "<div class=''>";
            echo "</h1>";
            echo "<p style='background-color:red;' class='genre'></p>";

            echo "</div>";
	}
	
	?>