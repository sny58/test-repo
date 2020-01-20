

<html>
<head>
	<title>fibonacci</title>
</head>
<body>
	
	<form action="" method="post">
		<input type="number" name="input"><br>
		<input type="submit" name="sub"><br>
	</form>
</body>
</html>

<?php

$a=0;
$b=1;
	
	if(!empty($_POST['sub']))
{
		$input=$_POST['input'];

	while($input>0)
	{
		echo $a . ",";
		$c= $a+$b;
		$a=$b;
		$b=$c;
		$input=$input-1;
	}
} 


?>