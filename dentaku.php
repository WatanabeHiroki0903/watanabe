<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>dentaku</title>
</head>
<body>

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
	if(!is_numeric($_POST["first"]) || !is_numeric($_POST["second"])){
		$errors[]="数値を二つ入力してください。";
	};
	
	$kigouList=["＋", "－", "×", "÷"];
	
	if(!in_array($_POST["kigou"], $kigouList)){
		$errors[]="記号の値が正しくありません。";
	};

	if(($_POST["kigou"]==="÷") && ($_POST["second"]==="0")){
	    $errors[]="0では割れません。";
    }
	
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

?>


</body>
</html>

