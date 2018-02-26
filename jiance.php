<?php
if($_COOKIE['position'] != 'inspector'){
		 	redirect_user();
		 }	
function redirect_user ($page = 'login.html') {
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	header("Location: $url");
	exit(); 
} 
?>