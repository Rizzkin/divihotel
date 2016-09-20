<?php 
include 'config.php';
include 'templates/header.php';
include 'models/functions.php';
session_start();

if(isset($_GET['page']))
{
	if($_GET['page'] == 'index')
	{
		include 'pages/index.php';
	}
	elseif($_GET['page'] == 'login')
	{
		include 'pages/login.php';
	}
	elseif($_GET['page'] == 'register')
	{
		include 'pages/register.php';
	}
	elseif($_GET['page'] == 'logout')
	{
		include 'pages/logout.php';
	}
	elseif($_GET['page'] == 'profile')
	{
		include 'pages/profile.php';
	}
	else
	{
	   include 'pages/index.php';
	}
}

require('includes/Util.php');

require('includes/bootstrap.php');

switch ($action) {
	case 'viewprofile':
		// initieer het model
		$user = new User();
		$result = $user->showProfile();
		include 'pages/profile.php';
		break;

}
?>