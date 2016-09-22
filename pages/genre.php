<?php 
	include $basePath . '/templates/nav.php';
?>
<br>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="btn-group btn-group-justified" role="group" aria-label="" style="margin-top: -9px;">
                        <!--		<a href='?action=home'>All</a>-->
                        <?php
                        foreach ($getGenre as $data){
                            echo "<div class=\"btn-group\" role=\"group\">";
                            echo "<button type=\"button\" class=\"btn btn-default\"><a style='color:".$data['land_name']."' href='?action=sort&id=". $data['id']."'>". $data['land_name'] ."</button></a>";
                            echo "</div>";
                        }
                        ?>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
		<?php
        foreach ($sortGenre as $house) {
        	
            $image = $house['imageurl'];
            $id = $house['house_id'];
            $vhouse = $house['house'];
            $park = $house['park'];
            $genrecolor = $house['land_color'];

            echo "<a href='?action=viewhouse&id=$id'>";
            echo '<div class="col-xs-4">';
            echo '<h1 class="title">'.$house['house'];
            echo "<div class='wrappercontent'style='"."background-image: url(".$image.");'>";

            echo "<div class=''>";
            echo "</h1>";
            echo "<p style='background-color:$genrecolor!important;' class='genre'>". $park ."</p>";

            echo "</div>";
        }
        
        ?>