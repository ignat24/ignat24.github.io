<?php 
include('config.php');
$select='0';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Travelbook</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" > 
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<a name="top"></a>
	
  
  	<?php
  		if ($_COOKIE['users']==''):
  		
  	  ?>
  	  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">TravelBook по Харькову</h5>
  	  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="#inf">Информация</a>
    <a class="p-2 text-dark" href="#pp">Маршруты</a>
   <!--  <a class="p-2 text-dark" href="#">Добавить маршрут</a> -->
    <a class="p-2 text-dark" href="#pk">Поиск</a>
  </nav>
  <a class="btn btn-outline-primary" href="aftr.php">Войти</a>
</div>
<?php
  		elseif ($_COOKIE['users']=="admin"):
  		
  	  ?>
  	  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">TravelBook по Харькову</h5>
  	  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="poisk.php">Все маршруты</a>
    <a class="p-2 text-dark" href="obj1.php">Добавить маршрут</a>
    <a class="p-2 text-dark" href="obj4.php">Заказы</a>
    <a class="p-2 text-dark" href="obj3.php">Запросы на добавление</a>
   <!--  <a class="p-2 text-dark" href="#">Добавить маршрут</a> -->
    
  </nav>
  <a class="btn btn-outline-primary" href="exit.php">Выйти</a>
</div>


<?php
else:
	?>
	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">TravelBook по Харькову</h5>
  	  <nav class="my-2 my-md-0 mr-md-3">
    
    
    <a class="p-2 text-dark" href="mailto:d.ignatushkin@gmail.com">Написать</a>
    <a class="p-2 text-dark" href="prosm.php">Маршруты</a>
    <a class="p-2 text-dark" href="obj1.php">Добавить/Заказать маршрут</a>
   
  </nav>

  <a class="btn btn-outline-primary" href="exit.php">Выйти</a>
</div>
<?php endif;  ?>
  




<div class="container1">
	<div class="txt">
		<h1>Хочешь узнать свой город по-новому?</h1>
		<h1>TravelBook поможет тебе!</h1>
	</div>
</div>
<hr>
<a name="inf"></a>
<div class="info">
	

	<p><b>Dreamtrip</b> - сервис легкого поиска самых интересных и красивых маршрутов для вас! Мы поможем обустроить ваш досуг в отпуске, командировке или в любой поездке, куда бы вы не отправились. Выбирайте город, где вы живете или, куда хотели бы поехать и наслаждайтесь отдыхом вместе с Dreamtrip.</p> 
		<p>Достаточно тратить время на поиск интересных мест, куда бы сходить в свое свободное место! Кликай на интересный для тебя маршрут и вперед путешествовать!</p>
	</div>

<hr>
<a name="pp"></a>
<div class="popular">
	<h3>Популярные маршруты:</h3>
	

		<?php
			$sql = mysqli_query($dbcnx,"SELECT * FROM map WHERE map.rating > '4'") or die (mysqli_error($dbcnx));
					while ($myrow = mysqli_fetch_array($sql)) {
						echo"<div class=content1>";
						echo"<div class=content2>";
						echo"<h1>".$myrow['name']."</h1>";
						echo"<p><b>Для кого:</b> ".$myrow['opis']."</p>";
						echo"<p><b>Длина:</b> ".$myrow['length']." км</p>";
						echo"<p><b>Рейтинг:</b> ".$myrow['rating']."</p>";
						$key = $myrow['id']; 
     					  echo "<TD><a href=obj.php.?id=$key>Узнать больше</a></TD>"; 
              			// echo "<TD><a href=".$myrow['description'].">Узнать больше</a></TD>"; 
              			echo"</div>";
              			echo"</div>";
              			echo "<hr>";
					// echo "<tr>";
					// echo "<td>".$myrow['name']."</td>";
					// echo "<td>".$myrow['opis']."</td>";
					// echo "<td>".$myrow['length']."</td>";
					// echo "<td>".$myrow['rating']."</td>";
					//  $key = $myrow['id']; 
     //          echo "<TD><a href=obj.php.?id=$key>Больше</a></TD>"; 
     //          echo"</a>";
					// echo "</tr>";
				}


		  ?>


	</table>



</div>
<hr>
<a name="pk"></a>
<div class="poisk">
			<h3>Выберите категорию:</h3>
			
			
			  <div class="container5">
<form>
			  	<?php
				
					$countryNum = mysqli_query($dbcnx,"SELECT * FROM categories");
				 ?>
				<select class="form-control form-control-lg" name="selectName">
					<option select="selected" value="0">Категория...</option>
					<?php 

						while ($country = mysqli_fetch_assoc($countryNum)) {
							?>
						<option value="<?php echo $country['id']?>"><?php echo $country[name_categor] ?></option>
					<?php
						}
					 ?>
				</select>
				<input class="btn btn-success mt-1" type="submit" id="poisk" value="Выбрать">
			</form>


			<!-- <form >
			<select class="form-control form-control-lg" name="selectName">
				<option select="selected" value="0">Категория...</option>
				<option value="2">Вечерняя прогулка</option>
				<option value='1'>Велопрогулка</option>
				<option value="4">Прогулка по достопримечательностям</option>
				<option value="3">Прогулка по паркам</option>
			</select>			
			<input class="btn btn-success mt-1" type="submit" id="poisk" value="Выбрать">
		</form> -->
</div>
		
		
		
			<div class="contant">
				<table align="center" border="4">
					
					


					<?php

				$select= $_GET['selectName'];
				
				if ($select!='0'|| $select='') {
					// echo"
					// <table align=center border=4>
					// <tr>
					// 		<th>Название</th>
					// 		<th>Описание</th>
					// 		<th>Длина</th>
					// 		<th>Рейтинг</th>
					// 		<th>Узнать</th>

					// 	</tr>";
					
					$sql = mysqli_query($dbcnx,"SELECT * FROM map WHERE map.id_map = '$select'") or die (mysqli_error($dbcnx));
					while ($myrow = mysqli_fetch_array($sql)) {
					if($select=='1')
						echo"<div class=content3>";
					if ($select=='4')
					echo"<div class=content7>";
				if ($select=='2')
					echo"<div class=content8>";
				if ($select=='3')
					echo"<div class=content6>";
						
						echo"<div class=content2>";
						echo"<h1>".$myrow['name']."</h1>";
						echo"<p><b>Для кого:</b> ".$myrow['opis']."</p>";
						echo"<p><b>Длина:</b> ".$myrow['length']." км</p>";
						echo"<p><b>Рейтинг:</b> ".$myrow['rating']."</p>";
						$key = $myrow['id']; 

     					  echo "<a href=obj.php.?id=$key>Узнать больше</a>"; 
              			
              			
              			echo"</div>";
              			echo"</div>";
              			echo "<hr>";
					
		}
					
				}
					
			?>
	
				</table>

</div>


			<!-- <div class="showContent" style="display: none;">
				
			</div> -->
			
		<hr>
		<div class="container2">
			<h1>Контакты</h1>
			<p>(+380)-95-506-34-09</p>
			<p>(+380)-66-322-42-53</p>
			<p><a href="mailto:d.ignatushkin@gmail.com">Наша почта</a></p>
		</div>
	<footer class="blog-footer">
  <p>TravelBook по Харькову 2020 </p>
  <p>
  	<a href="mail.php">Зарегестрироваться!</a>
  	<br>
    <a style="font-size: 25px;" href="#top">Back to top</a>

  </p>
</footer>


</body>
</html>