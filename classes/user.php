<?php
		
		/**
		 * 
		 */
		class user
		{
			public $nick;
			public $pass;
			function __construct($nickname, $password)
			{
				$this->nick = $nickname;
				$this->pass = $password;
			}

			public function reg()
			{
				require('dbConn.php');
				$checkQuery = $db->prepare("SELECT `nickname` FROM `users` WHERE `nickname` = ?"); // подготавливаем запрос, который проверит есть ли в базе никнейм введеный с инпута.
		 		$checkQuery->execute([$this->nick]); // подставляем значение инпута никнейм и выполняем запрос.
		 		$checkQuery = $checkQuery->fetch(PDO::FETCH_OBJ); //получаем значения. 
		 	  	if (!$checkQuery) // если запрос провалился
		 	  	{
					 	  	try 
					 	  	{
						 			$query = $db->prepare('INSERT INTO users(nickname, password) VALUES(?, ?)'); // подготавливаем запрос для записи в бд нового пользователя
						 			$query->execute([$this->nick, $this->pass]); // подставляем данные и выполяем запрос
						 			echo '<div class="alert alert-success m-auto w-25">You need2verify yourself. Check you email.</div>'; // вывод об успешной регистрации
					 		  }catch (PDOException $e)
					 		  {
								  echo '<div class="alert alert-danger m-auto w-25">ERROR!</div>'; // сообщение ерор в случаи ошибки
								  die(); // завершение скрипта
					 			}
		 	  	}else echo '<div class="alert alert-danger w-25 m-auto">ERROR: nickname already exists! </div>'; // сообщение ерора, что такой никнейм уже существует, поскольку запрос в переменной $checkQuery удался - сверху.
			}

			public function auth()
			{
				require('dbConn.php');
				$query = $db->prepare('SELECT * FROM `users` WHERE `nickname` = ?'); // подготавливаем запрос который выберет все значения связанные с введеным никнеймом
				$query->execute([$this->nick]); // подсталяем никнейм и выполняем
				$user = $query->fetch(PDO::FETCH_OBJ); // получаем данные в виде объекта
				if ($user && password_verify($this->pass, $user->password)) // если запрос удался и есть пееменная $user, и если проверка на подлинность пароля в базе и пароля введенного удалась
				{	
					//self::statusCheck();

							session_start();
							$_SESSION['nickname'] = $this->nick;
							echo '<div class="alert alert-success m-auto w-25">Success!</div>'; // вывод об успешной авторизации
							header('Location: index.php'); // редирект 
					
				}else echo '<div class="alert alert-danger m-auto w-25">ERROR: wrong password or nickname</div>'; // вывод ошибки
			}

			public function statusCheck()
			{	
					 require('dbConn.php');
				 	 $statusQuery = $db->prepare('SELECT status FROM `users` WHERE `nickname` = ?');
					 $statusQuery->execute([$this->nick]);
					 $statusQuery = $statusQuery->fetch(PDO::FETCH_OBJ);
					
					if ($statusQuery->status == "need2verify") {
						echo '<div class="alert alert-warning m-auto w-25">You need2verify. Go to your email adress</div>';
					}
					exit();
			}

			public function verify(){
				
			}
		}
?>
					