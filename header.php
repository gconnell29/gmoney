<?php

function curPageURL() {
 $pageURL = 'http';
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

// $highlight = "";
if (strpos(curPageURL(), "index")) { ?>
	<style>.home_tab {color: red;}</style>
<?php } elseif (strpos(curPageURL(), "people")) { ?>
	<style>.people_tab {color: red;}</style>
<?php } elseif (strpos(curPageURL(), "work")) { ?>
	<style>.work_tab {color: red;}</style>
<?php } elseif (strpos(curPageURL(), "interests")) { ?>
	<style>.interests_tab {color: red;}</style>
<?php } elseif (strpos(curPageURL(), "about")) { ?>
	<style>.about_tab {color: red;}</style>
<?php } ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>G$'s Website</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script src="scripts/jquery-1.11.3.js" type=""></script>
		<script src="scripts/jquery-1.11.3.min.js" type="text/javascript"></script>
		<script src="scripts/script.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<div class="header-container">
				<img class="profile-pic" src="images/profile-pic.jpg" alt="profile pic" />
				<div class="phrases">
					<p>TEAMS?!</p>
				</div>
				<div class="header-content">
					<div class="name">G$</div>
				</div>
				<nav>
					<li class="home_tab"><a href="index.php">Home</a></li>
					<li class="people_tab"><a href="people.php">People</a></li>
					<li class="work_tab"><a href="work.php">Work</a></li>
					<li class="interests_tab"><a href="interests.php">Interests</a></li>
					<li class="about_tab"><a href="about.php">About Me</a></li>
				</nav>
			</div>
		</header>