<?php
while ($_COOKIE['polzovatel_id'] == Null)
   {header('Location: /start.php');}

include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php'; //подключам конфигурацию БД
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php'; //подключаем шапку со стилями


?>


<section class="a">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-xl-4 a1 d-flex justify-content-between">
          <ul class="list-group">
          <div id="rectangle" class="border-bottom" >
            <img src="http://multiprogrammer.local/assets/img/Logo.png" alt="">
          </div>
              <div id="rectangle2">
                <ul class="list-group ml-4">
                  <li>Результат <span class="text ml-4">1000000</span></li>
                  <li>Результат <span class="text ml-4">1000000</span></li>
                  <li>Результат <span class="text ml-4">1000000</span></li>
                  <li>Результат <span class="text ml-4">1000000</span></li>
                  <li>Результат <span class="text ml-4">1000000</span></li>
                </ul> 
              </div>
          </ul>
      </div>


<?php 
  if (isset($_COOKIE['victory'])) {header("location: /victory.php");}
  if (isset($_COOKIE['gameover'])) {header("location: /gameover.php");}
  //номер вопроса - $x 
  $proverka = 0;
  if (isset($_COOKIE['page'])) {$x = $_COOKIE['page'];} 
     else {$x = 1; setcookie("page", $x, time() + 60*60,"/");};
  

  // произвольная сортировка вопросов из 3 таблиц БД vopros
  $sort_vopros_temp = random_int(1, 3);  
  $sort_vopros = "vopros_$sort_vopros_temp";

 // отправляем запрос в БД на получение инф. с вопроса № x
  $sql = "SELECT * FROM " . $sort_vopros ." WHERE `vopros_id` =" . $x;
  $result = $connect->query($sql);
  // преобразование данных в массив
  $row = mysqli_fetch_assoc($result);
  $vopros = $row['vopros'];
  // экранирование данных для дальнейшего отображения функцией htmlspecialchars (так как в тексте используются символы HTML, Php)
  $otvet_yes = htmlspecialchars($row['otvet_0']);
  $otvet_no1 = htmlspecialchars($row['otvet_1']);
  $otvet_no2 = htmlspecialchars($row['otvet_2']);
  $otvet_no3 = htmlspecialchars($row['otvet_3']);
  // перезапись массива в случайном порядке, где результат новый = $otvet 
  $otvet = [$otvet_yes, $otvet_no1, $otvet_no2, $otvet_no3];
  $temp = shuffle($otvet);

  $A = $otvet[0];
  $B = $otvet[1];
  $C = $otvet[2];
  $D = $otvet[3];

 // проверяем на каком месте (кнопка_id) правильный ответ 
  for ($i = 0; $i < count($otvet); $i++) {
      if ($otvet[$i] == $otvet_yes) {
        $proverka=$i+1;
      }
  }
  
  
?>     

      <div class="col-md-6 col-xl-4 a2 justify-content-center">
        <div id="rectangle4">
          <p style = "text-align: center; <?php if (($x == 5)||($x == 10)||($x==15)){echo ('color: #007bff');} else {echo ('color: #6be186');} ?>">            
            <?php echo ('Вопрос №' . $row['vopros_id'])?>
          <br>
          <pre> <?php echo htmlspecialchars($row['vopros']) ?></pre>
          </p>
        </div>

      </div>

      <div class="col-md-6 col-xl-4 a3 d-flex justify-content-end ">        
        <div id="rectangl3" style="width: 200px; height: 600px; background: #060d0090; border: 1px solid #000000" class="d-flex justify-content-center">
          <ul class="list-group">

            
            <li class="list-group-item <?php if ($x == 15){echo "list-group-item-secondary";} else {}?>">1048576</li>
            <li class="list-group-item <?php if ($x == 14){echo "active";} else {}?>">524288</li>
            <li class="list-group-item <?php if ($x == 13){echo "active";} else {}?>">262144</li>
            <li class="list-group-item <?php if ($x == 12){echo "active";} else {}?>">131072</li>
            <li class="list-group-item border-bottom <?php if ($x == 11){echo "active";} else {}?>">65536</li>
            <li class="list-group-item <?php if ($x == 10){echo "list-group-item-secondary";} else {}?>">32768</li>
            <li class="list-group-item <?php if ($x == 9){echo "active";} else {}?>">16384</li>
            <li class="list-group-item <?php if ($x == 8){echo "active";} else {}?>">8192</li>
            <li class="list-group-item <?php if ($x == 7){echo "active";} else {}?>">4096</li>
            <li class="list-group-item border-bottom <?php if ($x == 6){echo "active";} else {}?>">2048</li>
            <li class="list-group-item <?php if ($x == 5){echo "list-group-item-secondary";} else {}?>">1024</li>
            <li class="list-group-item <?php if ($x == 4){echo "active";} else {}?>">512</li>
            <li class="list-group-item <?php if ($x == 3){echo "active";} else {}?>">256</li>
            <li class="list-group-item <?php if ($x == 2){echo "active";} else {}?>">128</li>
            <li class="list-group-item <?php if ($x == 1){echo "active";} else {}?>">64</li>
          </ul>
        </div>
      </div>

      <div class="col-md-6 col-xl-4 a4 "></div>

      <div class="col-md-6 col-xl-4 a5"></div>
      <div class="col-md-6 col-xl-4 a6"></div>
    </div>
  </div>
</section>
<section class="b">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- <div class="col-md-6 col-xl-3 b1"></div> -->

      <div class="col-md-6 col-xl-3 b2">
        <div class="container-fluid">
          <div>

            <button id="1" type="button" class="btn btn-outline-dark mb-4 mr-4 mi1" style ="text-align: left" onclick="otvet(this)" data-id=<?php echo  $proverka ?>>
              <span class="text mr-4">A: </span><?php echo ($A) ?>
            </button>

            <button id="2" type="button" class="btn btn-outline-dark mr-4 mi1" style ="text-align: left" onclick="otvet(this)" data-id=<?php echo  $proverka ?>>
              <span class="text mr-4">B: </span><?php echo ($B) ?>
            </button> 

          </div>
        </div>
      </div>

      

      <div class="col-md-6 col-xl-3 b3">
        <div class="container-fluid">
          <div>

            <button id="3" type="button" class="btn btn-outline-dark mb-4 ml-5 mi1" style ="text-align: left" onclick="otvet(this)" data-id=<?php echo  $proverka ?>>
              <span class="text mr-4">C: </span><?php echo ($C) ?>
            </button>

            <button id="4" type="button" class="btn btn-outline-dark ml-5 mi1" style ="text-align: left" onclick="otvet(this)" data-id=<?php echo  $proverka ?>>
              <span class="text mr-4">D: </span><?php echo ($D) ?>
            </button> 

          </div>
        </div>
      </div>

      
    </div>
  </div>
</section>


 
  

  
  

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/multiprogrammer.js"></script>

</body>
</html>


