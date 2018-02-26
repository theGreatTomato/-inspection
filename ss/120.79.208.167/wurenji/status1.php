<?php
if($_POST['status'] == "loginout"){
	setcookie ('position', '',time()-3600, '/');
	$arr = array(0 => 'false');
	echo json_encode($arr);	
}
else{
	if(!isset($_COOKIE['position']) || $_COOKIE['position'] != 'administrator'){
		$arr = array(0 => 'false');
		echo json_encode($arr);	
	}	
	else{
		//*****从数据库提取数据
		include 'mysql_connect.php';
		$select = 'SELECT * FROM guzhang';
		$result = mysql_query($select);
		class RM{
		  public $gz_id;
		  public $date;
		  public $up_down;
		  public $addr;
		  public $variety;
		  public $grade;
		  public $image;
		  public $inspector;
		  public $link;
		  function __construct($gz_id,$date,$up_down,$addr,$variety,$grade,$image,$inspector,$link){
		    $this->gz_id = $gz_id;
		    $this->date = $date;
		    $this->up_down = $up_down;
		    $this->addr = $addr;
		    $this->variety = $variety;
		    $this->grade = $grade;
		    $this->image = $image;
		    $this->inspector = $inspector;
			$this->link = $link;
		  }
		}
		$arr = array();
		while($row = mysql_fetch_array($result))//可以用这种循环让它一直执行下去 
		  {
		  $newRm = new RM($row['gz_id'],$row['date'],$row['up_down'],
		    $row['addr'],$row['variety'],$row['grade'],$row['image'],$row['inspector'],$row['link']);
		  array_push($GLOBALS['arr'],$newRm);
		 }
		echo json_encode($arr);	
	}
}
?>