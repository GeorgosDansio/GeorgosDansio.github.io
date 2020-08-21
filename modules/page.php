<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php'; //подключам конфигурацию БД

if (isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST") {
	setcookie("gameover", '' ,'',"/");
	$otvet = $_POST['otvet'];
   	setcookie("otvet", $otvet, time() + 60*60,"/");
   	if ($otvet == 1) {
   		$x = $_COOKIE['page'] + 1;           
    	setcookie("page", $x, time() + 60*60,"/");
    	if ($x == 6) {
    		setcookie("reiting", 1024 , time() + 60*60,"/");
        // reiting();        
    	};
    	if ($x == 11) {
    		setcookie("reiting", 32768 , time() + 60*60,"/");
        // reiting();
    	};
    	if ($x == 16) {
    		setcookie("reiting", 1048575 , time() + 60*60,"/");
    		setcookie("victory", 1048575 , time() + 60*60,"/");
        // reiting();
    	}
    	
   	} else {
   		// header("location: /exit.php");
   		setcookie("page", 1, time() + 60*60,"/");
   		setcookie("gameover", 1 , time() + 60*60,"/");
   	}   
           	
  } else { $x=1; setcookie("page", $x, time() + 60*60,"/");};

  // function reiting (){
  //   $r = $_COOKIE['reiting'];
  //   $sql = "INSERT INTO `rating` (`user_id`, `result`) VALUES ('" . $_COOKIE['polzovatel_id'] . "', '" . $r . "')";
  //   if (mysqli_query($connect, $sql)) {setcookie("Dobavlen", 1 , time() + 60*60,"/");};    
  // }

?>