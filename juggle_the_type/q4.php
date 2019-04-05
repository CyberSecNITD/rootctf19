<?php
	if ($_GET["submit"]!==null && $_GET["input"]!==null) {
		$flag = "root@ctf{7yp3_jugg!ing_bug5_4r3_c0mm0n_!n_php}";

		$user_input = $_GET["input"];

		var_dump($user_input);

		if (strlen($user_input) === 2) {
			var_dump("Hmm, nope!");
			exit();
		}

		if ($user_input === 10) {
			var_dump("Better luck next time, kiddo ;p");
			exit();
		}

		if (md5((int)$user_input) == md5(10)) {
			var_dump($flag);
		}
	}
?>

<html>
	<body>
		<form method="GET">
			<input type="text" name="input" id="input" />
			<input type="submit" value="submit" name="submit" />
		</form>
	</body>
</html>
