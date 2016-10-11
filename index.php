<?php 
include 'config.php';
include 'models/Song.php';
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
	elseif($_GET['page'] == 'fullresort')
	{
		include 'pages/fullresort.php';
	}
	elseif($_GET['page'] == 'protected')
	{
		include 'pages/protected.php';
	}
	elseif($_GET['page'] == 'contact')
	{
		include 'pages/contact.php';
	}
	elseif($_GET['page'] == 'reserveren')
	{
		include 'pages/reserveren.php';
	}
	elseif($_GET['page'] == 'controlreservation')
	{
		include 'pages/controlreservation.php';
	}
	elseif($_GET['page'] == 'medewerkerpanel')
	{
		include 'pages/medewerkerpanel.php';
	}
	elseif($_GET['page'] == 'control')
	{
		include 'pages/control.php';
	}
	elseif($_GET['page'] == 'contact')
	{
		include 'pages/contact.php';
	}
	else
	{
	   include 'pages/index.php';
	}
}

require('includes/Util.php');

require('includes/bootstrap.php');

switch ($action) {
	
	case 'viewhouse':
		// initieer het model
		$houseModel = new Song();
		$selectSingle = $houseModel->getOne($id);
		$selectAll = $houseModel->getAll();
		include 'pages/singleresort.php';
		break;
	
	case 'delete':
		$houseModel = new Song();
		$houseModel->delete(isset($_GET['id']) ? $_GET['id'] : 0);
		$selectAll = $houseModel->getAll();
		include 'pages/control.php';
		break;
	
	case 'deletereservation':
		$resModel = new User();
		$resModel->delete(isset($_GET['id']) ? $_GET['id'] : 0);
		$selectAll = $resModel->getallBookings();
		include 'pages/controlreservation.php';
		break;
	
	case 'updateemployee':
		$resModel = new User();
		$selectAll = $userModel->getUsers();
		include 'pages/medewerkerpanel.php';
		break;
	
	case 'viewprofile':
		// initieer het model
		$user = new User();
		$result = $user->showProfile();
		include 'pages/profile.php';
		break;

}
?>