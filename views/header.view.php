<?php
if (!isset($pageTitle)) {
	$pageTitle = '';
}
if (!isset($prenom)) {
	$prenom = '';
}
if (!isset($nom)) {
	$nom = '';
}
echo "<!DOCTYPE html>
<html>
	<head>
		<meta charset=\"utf-8\" />
		<title>Mon premier Blog</title>
	</head>

	<body>
		<h1>$pageTitle</h1>
		<p> Bonjour $prenom  $nom</p>";
if (isset($_GET['msg'])){
	echo "<h2>".urldecode($_GET['msg'])."</h2>\n";
	
}
