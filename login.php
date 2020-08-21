<?php

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php'; //подключам конфигурацию БД

if(
	isset($_POST["email"]) && isset($_POST["password"])
	&& $_POST["email"] != "" && $_POST["password"] != ""
) {
	
	$sql = "SELECT * FROM `polzovateli` WHERE `email` LIKE '" . $_POST["email"] . "' AND `password` LIKE '" . $_POST["password"] . "'";

	$result = mysqli_query($connect, $sql);
	$col_polzovateley = mysqli_num_rows($result);

	if($col_polzovateley == 1) {
		$polzovatel = mysqli_fetch_assoc($result);
		setcookie("polzovatel_id", $polzovatel["id"], time() + 60*60);
	 	setcookie("polzovatel_name", $polzovatel["name"], time() + 60*60);
	 	header("location: /");
	 }else{

		 header("location: /login.php");
	}	
}

include $_SERVER['DOCUMENT_ROOT'] . '/parts/header_start.php'; //подключаем шапку со стилями
?>
	 <div class="container">
        <div id="rectangle4">          
			<div class="container justify-content-center" style ="text-align: center">
				<form method="POST" style ="text-align: center;">

					<p>
						Введите свой email:<br/>
						<input type="text" name="email">
					</p>
					
					<p>
						Введите свой пароль:<br/>
						<input type="password" name="password">
				    </p>

				    <p style ="text-align: center">
				    	<button class="btn btn-outline-secondary" type="submit" style ="color: #3998df;" >Войти</button>
				    </p>
				    
				</form>

				<a href="register.php" style ="text-align: center">
				    <button class="btn btn-outline-secondary" style ="color: #3998df;">Регистрация</button>
				</a>

			</div>
        </div>
      </div>

</body>
</html>