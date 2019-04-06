<?php
	if ($_GET["submit"]!==null && $_GET["input1"]!==null) {
		$flag = "root@ctf{7yp3_jugg!ing_bug5_4r3_c0mm0n_!n_php}";

		$user_input = $_GET["input1"];

		$secret = random_int(0, 1000);
		$secret = hash_hmac($secret, $_GET["input1"], "sha1");


		if ($secret === json_decode($_GET["input2"])) {
			echo "<br />";
			var_dump($flag);
			echo "<br />";
		} else {
			echo "<br />";
			var_dump("Better luck next time kiddo ;p");
			echo "<br />";
		}
	}

?>

<html>
	<body>
		<form method="GET">
			Input-1: <input type="text" name="input1" id="input1" />
			<br />
			Input-2: <input type="text" name="input2" id="input2" />
			<br />
			<input type="submit" value="submit" name="submit" />
		</form>
	</body>
</html>

