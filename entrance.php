<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<style>
body{
		background-color: #000000;
	}
</style>
<body class=" text-white">
<div class="frm">
		<div class="col-md-4 m-auto">
				<a href="index.php"><img src="img/2dsky (1).png" alt="logo" class="img-fluid mx-auto d-block" title="Go to main page"></a>
			</div>

		<form method="post" class="w-25 m-auto">
			<input type="text" name="nickname" placeholder=" your nickname" maxlength="12" minlength="4" pattern="[a-zA-Zа-яА-яёЁ]+" title="nickname can't contain numbers or special chars" required class="form-control mb-1">
			<input type="password" name="password" placeholder=" your password" maxlength="12" minlength="6" required class="form-control mb-1">
			<div class="row">
				<div class="col-md-6">
					<input type="submit" name="submitReg" value="Register" class="form-control btn btn-success mb-1">
				</div>
				<div class="col-md-6">
					<input type="submit" name="submitAuth" value="Auth" class="form-control btn btn-success mb-1">
				</div>
			</div>
			
		</form>
</div>

	<?php 
			require_once('classes/user.php');
		 if (isset($_POST['submitReg']))  // если нажата кнопка регистрации.
		 {
		 		$nickname = filter_var(trim($_POST['nickname']), FILTER_SANITIZE_STRIPPED); // прогоняем инпут никнейма через фильтр, режем пробелы с концов функцией трим.
		 		$password = password_hash(filter_var(trim($_POST['password']), FILTER_SANITIZE_STRIPPED), PASSWORD_DEFAULT); 	// прогоняем инпут пароля через фильтр, режем пробелы с концов функцией trim и хешируем пароль функцией password_hash.
		 		$new_user = new user($nickname, $password);
			 	$new_user->reg();
			 	//$new_user->verify();
		 	}
		   
			if (isset($_POST['submitAuth'])) // если нажата кнопка авторизации
			{
				$nickname = filter_var(trim($_POST['nickname']), FILTER_SANITIZE_STRIPPED); // прогоняем инпут никнейма через фильтр, режем пробелы с концов функцией трим.
				$password = trim($_POST['password']); // режем пробелы с концов инпута пароль
				$auth_try = new user($nickname, $password);
				$auth_try->auth();
			}

	?>
</body>
</html>
