<?php 
	$log = new User();
	if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="?page=index">Divi Hotel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class=""><a href=?page=index>Home</a></li>
           <li><a href="?page=fullresort">Appartementen</a></li>
           <li><a href="?page=contact">Contact</a></li>
        </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <?php
$result = $log->showProfiles();
while ($row = mysqli_fetch_assoc($result)) {
    ?>
<li><a href="?action=viewprofile&id=<?php echo $log->encrypt($row['userid']); ?>"> Profile </a></li>

<?php }?>
                  <?php 
                  $log->adminNav();
	?>
                  <li><a href="?page=logout">Logout</a></li>
                </ul>
              </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php }
else{ ?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="?page=index">Divi Hotel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class=""><a href="?page=index">Home</a></li>
           <li><a href="?page=fullresort">Appartementen</a></li>
           <li><a href="?page=contact">Contact</a></li>
        </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?page=login">Login</a></li>
        <li><a href="?page=register">Register</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php }?>