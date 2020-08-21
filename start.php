<?php	     

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php'; //подключам конфигурацию БД

  $sql = "SELECT * FROM `pravila`";
  $result = $connect->query($sql);
  // преобразование данных в массив
  $row = mysqli_fetch_assoc($result);

include $_SERVER['DOCUMENT_ROOT'] . '/parts/header_start.php';
?>


<div class="container">	
        <div id="rectangle5"> 
        	
        	  <p style = "text-align: center;"><?php echo ($row['pravila'])?></p>
        
    		<div class="mi2">
			<a href="login.php">
			    <button class="btn btn-outline-dark mr-4" style ="color: #3998df; width: 100px;">Start</button>
			</a>
			</div>
		</div>      	
	   
</div>



</body>
</html>