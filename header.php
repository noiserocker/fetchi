<?php
/*
This is the header.php file which is embedded into every output page!
*/
// require_once('./inc/functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>fetchi</title>
	<script type="text/javascript" src="./js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('input[type="text"]').addClass("searchform");
       		$('input[type="text"]').focus(function() {
       			$(this).removeClass("searchform").addClass("searchform_active");
    		    if (this.value == this.defaultValue){ 
    		    	this.value = '';
				}
				if(this.value != this.defaultValue){
	    			this.select();
	    		}
    		});
    		$('input[type="text"]').blur(function() {
    			$(this).removeClass("searchform_active").addClass("searchform");
    		    if ($.trim(this.value) == ''){
			    	this.value = (this.defaultValue ? this.defaultValue : '');
				}
    		});
		});			
	</script>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/font-face.css">
</head>
<body>
<div id="header">
	<div id="head_wrap">
		<div class="logo">
			<a class="logolink" href="index.php"></a>
		</div>
		<div id="menu">
			<ul class="ul-menu">
				<li><a class="menu-active" href="index.php">Dashboard</a></li>
				<li><a href="drive.php">Fahrten</a></li>
				<li><a href="message.php">Nachrichten</a></li>
			</ul>
		</div>
		<div id="search">
			<div class="searchbar">
				<form action="<?php echo $PHP_SELF; ?>">
					<input class="searchform" type="text" name="search" value="Search..."></input>
				</form>
			</div>
		</div>
		<div id="user">
			<div class="user-avatar">
				<img src="./images/avatar/avatar_s.png">
			</div>
			<div class="user-name">
				John Doe
			</div>
			<div class="user-active">
				<li><a href="profile.php">Profil</a></li>
				<li><a href="settings.php">Einstellungen</a></li>
			</div>
		</div>
	</div>
</div>
<div id="wrapper">