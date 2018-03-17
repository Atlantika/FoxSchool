<?
$user_name = $_POST['user'];
//echo($user_name);

//подсоединяемся к БД один раз на странице
$mysqli = mysqli_connect("localhost", "atlantika", "89514681328nc", "atlantika"); 

//Выполяем запрос
$user_name = strip_tags($user_name);
$user_name = mb_ereg_replace('/[^а-яА-Яa-zA-Z]/','',$user_name);

$escaped_user_name = mysqli_real_escape_string($mysqli, $user_name);
$res = mysqli_query($mysqli, "INSERT INTO users (first_name) VALUES ('$escaped_user_name')");

header('Location:http://atlantika.myjino.ru/inside.php');
?>