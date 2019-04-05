<?php
	if ($_GET["submit"]!==null && $_GET["input"]!==null) {
		$flag = "root@ctf{7yp3_jugg!ing_bug5_4r3_c0mm0n_!n_php}";

		$user_input = $_GET["input"];

		var_dump($user_input);

		$secret = random_int(0, 1000);
		$secret = hash_hmac($secret, $_GET["input1"], "sha1");

		if ($secret == $_GET["input2"]) {
			var_dump(flag);
		} else {
			var_dump("Better luck next time kiddo ;p");
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

