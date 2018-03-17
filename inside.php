<!DOCTYPE HTML> 
<html>
	<head>
		<meta http-equiv="content-Type" content="text/html;charset=utf-8">
		<link rel="SHORTCUT ICON" href="fox006.ico" type="image/x-icon">
		<link rel = "stylesheet" href = "style/style.css">
		 <script src = "scripts.js">
//		  console.log('Загрузка ОК!');
		 </script>
	
	</head>
	
	
	<body>
		<div class="classshapka">шапка, верхнее меню.
		
		<a href="index.php"> 
			<img src="fox003.jpg">	
		</a>
			
			<img src="fox002.jpg">
			
		</div>

<div>
			<div class="classlevmain"> левое меню<br>
				<Div>
					<a href="inside.php"> 
						<br>Вход<br>	
					</a>
			 	</div>
				
				<div>
					<a href="register.html"> 
						<br>Зарегистрироваться<br>	
					</a>
				</div>

				<Div>
					Предмет: Русский язык.<br>
					Класс: 6<br>
			 		<a href="russkiy06.html"> Начать </a>
				</div>
				
			</div>	
			
			<div class="classContent"> 
			<h2 onclick="console.log('Да, это она!')"> Список пользователей.</h2>
			<?
			//подключаемся к базе данных - один раз на странице
			$mysqli = mysqli_connect("localhost", "atlantika", "89514681328nc", "atlantika"); 
			
			//выполняем запрос данных
			
			$page_size = 5;
			$res = mysqli_query($mysqli, "SELECT Count(*) FROM users");
			$row = mysqli_fetch_array($res);
			$user_count = $row[0];
			
			$pages = intval(($user_count + $page_size - 1) / $page_size);
			
			echo"<div>Пользователей: $user_count </div><br>";
			
			for($i = 1; $i <= $pages; $i++){
				echo"<a href='inside.php?p=$i'> $i</a>";
			};
			echo '<br>';
			
			$p = $_GET['p'];
			if ($p < 1) $p = 1;
			 echo 'Текущая страница:'. $p;
			 
			 $skip = ($p - 1) * $page_size;
			
			
			
			$res = mysqli_query($mysqli, "SELECT * FROM users ORDER BY first_name LIMIT $skip,$page_size");
			
			//получаем результат
			$users = array();
			while ($row = mysqli_fetch_assoc($res)){
				$users[] = $row;
			};
			
			//= file('users.txt');
			foreach($users as $u) {
				$fn = $u['first_name'];	
				$mn = $u['middle_name'];	
				$ln = $u['last_name'];
				echo "<div>$fn $mn $ln</div>";
			}
			
			//var_dump($users);
			
			
			
			
			?>
			</div>
		
		</div>
		<div class="classPodval"> подвал</div>
	
	
	</body>

</html>