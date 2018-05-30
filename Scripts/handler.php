<?php
include 'Connector.php';


if(isset($_POST['method']) && !empty($_POST['method']) && $_POST['method']=='connector' ) {
	 /* $action = $_POST['method'];
    switch($action) {
        case 'connector' : connector();break;*/
   $connector = new Connector();
	$sql = "SELECT * FROM categories";
   $connection = $connector->connect("localhost", "greta", "gretarossetto93");
	$connector->chooseDB("FancyGarden", $connection);
	
	echo $connector->queryDB($sql, $connection);
	$connector->close($connection);
}
	
?>