<?php
$user = new User();
$result = $user->showProfiles();
?>

<?php 
while ($row = mysqli_fetch_assoc($result)) {
echo $row['username'];
echo $row['email'];
echo $row['naam'];?>
<a href="profile.php?id=<?php echo $row['id']; ?>"> edit </a>

<?php }?>