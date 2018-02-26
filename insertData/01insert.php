<?php 
	include '../mysql_connect.php';	
for ($i=0; $i < 81; $i++) { 

	$insert = "UPDATE guzhang SET addr = '西乡' WHERE gz_id > 168 and gz_id <190";
	$a = mysql_query($insert);
}
echo 'success';
?>