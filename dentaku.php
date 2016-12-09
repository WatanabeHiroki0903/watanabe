<?php
require_once("header.php");
require_once("util.php");
?>

<form action ="dentaku.php" method="post">
	<input type="number" name="first">
	<select name="kigou">
		<option value="＋">＋</option>
		<option value="－">－</option>
		<option value="×">×</option>
		<option value="÷">÷</option>
	</select>
	<input type="number" name="second">
	<input type="submit" value="計算する">
</form>


<?php

$errors=[];

if(isset($_POST["first"]) && isset($_POST["kigou"]) && isset($_POST["second"])){
	if(empty($_POST["first"]) || empty($_POST["second"])){
		$errors[]="数値を二つ入力してください。";
	}else if(!is_numeric($_POST["first"]) || !is_numeric($_POST["second"])){
		$errors[]="値は数値を入力してください。";
	};
	
	$kigouList=["＋", "－", "×", "÷"];
	
	if(!in_array($_POST["kigou"], $kigouList)){
		$errors[]="記号の値が正しくありません。";
	};
	
	if(count($errors)>0){
		echo "<hr>";
		foreach($errors as $value){
			echo $value, "<br>";
			exit();
		};
	};
	
	$first=$_POST["first"];
	$second=$_POST["second"];
	$kigou=$_POST["kigou"];
	
	switch($kigou){
		case "＋":
			$result=$first + $second;
		break;
		case "－":
			$result=$first - $second;
		break;
		case "×":
			$result=$first * $second;
		break;
		case "÷":
			$result=$first / $second;
		break;
		};
		
	echo "<hr>", $first, $kigou, $second, "＝", $result;
};
require_once("footer.php");
?>