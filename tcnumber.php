<?php

if ($_POST) {

	echo "Post request is exist! <hr>";

	$tcno = $_POST['tc'];

	if (is_numeric($tcno)) {
		if (strlen($tcno) != 11 || $tcno[0] == 0) {
			echo "Tc kimlik numaranız 11 haneden oluşmalıdır ve ilk hanesi 0 olmamalıdır!";
			header("Refresh:3");
		} elseif (strlen($tcno) == 11) {
			$evennum = $tcno[0] + $tcno[2] + $tcno[4] + $tcno[6] + $tcno[8];
			$oddnum = $tcno[1] + $tcno[3] + $tcno[5] + $tcno[7];

			$tenth = (($evennum * 7) - $oddnum) % 10;

			$lastnum = ($evennum * 8) % 10;

			if ($tenth == $tcno[9] && $lastnum == $tcno[10]) {
				echo "Bu bir Tc kimlik numarasıdır!";
			}
		}
	} else {
		echo "Sayı harici bir karakter girdiniz! Lütfen tekrar deneyiniz.";
		header("Refresh:3");
	}
} else {

	echo "Post request doesn't exist! <hr>";

	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Tc number form</title>
		<style>
			body {
				text-align: center;
				font-size: 18px;
			}

			form {
				display: inline-block;
			}

			.btn {
				background-color: cornflowerblue;
				border: 1px solid #999;
				border-radius: 5px;
				width: 75px;
				height: 25px;
				color: aliceblue;
			}

			.tcno {
				width: 200px;
				margin: 10px auto;
				height: 25;
				border: 1px solid black;
				border-radius: 5px;
			}
		</style>
	</head>

	<body>
		<form method="POST" action="">
			<input type="text" name="tc" class="tcno" placeholder="TC Kimlik No" required>
			<input type="submit" class="btn" value="Kontrol Et">
		</form>

	</body>

	</html>

<?php

}

?>