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
	
	<?php 
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	
	?>
	<br>
	<br>
	<br>
	<?php
	foreach ($selectAll as $house) {

            $image = $house['imageurl'];
            $id = $house['id'];
            $vhouse = $house['house'];
            $price = $house['price'];

            echo "<a href='?action=viewhouse&id=$id'>";
            echo '<div class="col-xs-4">';
            echo '<h1 class="title">'.$house['house'];
            echo "<div class='wrappercontent'style='"."background-image: url(".$image.");'>";

            echo "<div class=''>";
            echo "</h1>";
            echo "<p style='background-color: $color; ?>;' class='genre'>". "&euro; ", $price ." per nacht</p>";

            echo "</div>";
	}
	
	?>