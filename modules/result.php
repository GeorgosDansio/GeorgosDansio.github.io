<?php
if (isset($_COOKIE['reiting'])) {
  $r = $_COOKIE['reiting'];

  // $sql = "UPDATE `rating` SET `result` = '" . $r ."' WHERE `rating`.`id` = " . $_COOKIE['polzovatel_id'];

   $sql = "INSERT INTO `rating` (`user_id`, `result`) VALUES ('" . $_COOKIE['polzovatel_id'] . "', '" . $r . "')";
  if (mysqli_query($connect, $sql)) {setcookie("Dobavlen", 1 , time() + 60*60,"/");}; 
}

?>