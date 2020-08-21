<?php
 
 if (isset($_COOKIE['polzovatel_id']) && isset($_COOKIE['polzovatel_name'])) {
 	setcookie('polzovatel_id','', 0,"/");
 	setcookie("polzovatel_name",'', 0,"/"); 
 	setcookie("otvet",'', 0,"/");
 	setcookie("page",'', 0,"/");
 	setcookie("reiting",'', 0,"/");  
 } 
 
?>