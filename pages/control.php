<?php 
include $basePath . '/templates/nav.php';
		$houseModel = new Song();
		$houseModel->Add();
		$selectAll = $houseModel->getAll();
		$houseModel->delete(isset($_GET['id']) ? $_GET['id'] : 0);

		$log = new User();
		
		$log->protect_page();
		$log->checkAdmin();
?>
<br>
<br>
<br>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-*.min.js"></script>

<br>
<div class="container">
    <div class="row">
    <div class="col-xs-12">
    <table class="table">
    <thead>
    <tr>
    <th style="width:100px;">Room</th>
    <th style="width:130px; text-align: center">Delete</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    </tr>
    <?php
    foreach($selectAll as $house){
        echo "<tr>";
//        Artist
        echo "<td>";
        echo $house['house'];
        echo "</td>";


        echo "<td style='text-align: center'>";
        echo "<a class='remove' href='?action=delete&id=". $house['id'] . "'><i class=\"fa fa-trash\"></i></a>";
        echo "</td>";

//        End Row
        echo "</tr>";
   }
    ?>
    </tbody>
    </table>
    </div>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
    <div class="col-xs-12" >
        <br>
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#add" aria-controls="home" role="tab" data-toggle="tab">Add a new house</a></li>
      </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <br>
                <div role="tabpanel" class="tab-pane active" id="add">
                    <form class="" action="?page=control" method="post">
                        <div class="form-group">
                        <p>
                            <label for="house">Room :</label>
                            <input type="text" class="form-control" name="house" id="house" required>
                        </p>
                        <p>
                            <label for="house">Price :</label>
                            <input type="text" class="form-control" name="price" id="price" required>
                        </p>
                        <p>
                            <label for="imgurl">Image URL :</label>
                            <input type="text" class="form-control" name="imageurl" id="imageurl" required>
                        </p>
                        <p>
                            <label for="context">Description :</label>
                            <input type="text" class="form-control" name="description" id="description" required>
                        </p>
                        <br><br>
                        <input type="submit" name="submit" class="btn btn-primary" value="Add new room!">
                     </div>
                    </form>
                    <br>
               </div>
            </div>

        </div>
           </div>
    </div>
</div>








