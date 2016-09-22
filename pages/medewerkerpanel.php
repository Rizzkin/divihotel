<?php
include $basePath . '/templates/nav.php';

$userModel = new User();
$selectAll = $userModel->getUsers();

if (!isset($_SESSION["logged"]))
{
    header("location: ?page=login");
}
?>
<br><br><br>

<?php 
// var_dump($selectAll);
?>
<div class="container">
    <div class="row">
    <div class="col-xs-12">
    <table class="table">
    <thead>
    <tr>
    <th style="width:100px;">Medewerker naam</th>
    <th style="width:100px;">User Level</th>
    <th style="width:130px; text-align: center">Delete</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    </tr>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    <?php
    foreach($selectAll as $user){
        echo "<tr>";
//        Start row
//        header
     echo "<th>";
     echo $user['username'];
     echo "</th>";

//        Artist
        echo "<td>";
        echo $user['user_level'];
        echo "</td>";

//        End Row
        echo "</tr>";
   }
    ?>
 			<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" /><br>
 			Email<br>
 			<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" /><br>
 	</form>
    </tbody>
    </table>
    </div>
    </div>
    <br>
    <br>
    <br>
