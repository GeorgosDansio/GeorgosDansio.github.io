<?php

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php'; //подключам конфигурацию БД

if(
	isset($_POST["email"]) && isset($_POST["password"])
	&& $_POST["email"] != "" && $_POST["password"] != ""
) {
	$sql = "INSERT INTO polzovateli (email, password, name) VALUES ('" . $_POST["email"] . "', '" . $_POST["password"] . "', '" . $_POST["name"] . "')";
	if (mysqli_query($connect, $sql)) {
		echo "<h2>Пользователь добавлен</h2>";
		header('Location: /login.php');
	} else {
		echo "<h2>Произошла ошибка</h2>" . mysqli_error($connect);
	}
}

include $_SERVER['DOCUMENT_ROOT'] . '/parts/header_start.php'; //подключаем шапку со стилями
?>
	 <div class="container">
        <div id="rectangle4">          
			<div class="container justify-content-center" style ="text-align: center">
				<form method="POST" style ="text-align: center;">
					<p>
						Введите ваше имя:<br/>
						<input type="text" name="name">
					</p>

					<p>
						Введите свой email:<br/>
						<input type="text" name="email">
					</p>
					
					<p>
						Введите свой пароль:<br/>
						<input type="password" name="password">
				    </p>

				    <p style ="text-align: center">
				    	<button class="btn btn-outline-secondary " type="submit" style ="color: #3998df;" >Зарегистрироватся</button>
				    </p>
				    
				</form>

				<a href="login.php" style ="text-align: center">
				    <button class="btn btn-outline-secondary " style ="color: #3998df;">Авторизация</button>
				</a>

			</div>
        </div>
      </div>
	
</body>
</html>