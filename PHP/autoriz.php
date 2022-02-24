<?php


$name = $_REQUEST['login']; //Вытаскиваем из формы html-файла запись, введенную пользователем
$password = $_REQUEST['password'];

//echo $name, PHP_EOL;
//echo $password;

//Подключение к базе данных:
$servername = "localhost"; 
$database = "groom-room";
$username = "root"; //догин пароль от админки бд!!!
$pass = "";
$conn = mysqli_connect($servername, $username, $pass, $database); //Собственно само подключение

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";




$sql = 'SELECT login, pass FROM users'; //Чтение логинов, паролей из таблицы бд
$result = mysqli_query($conn, $sql); //Запись результата
//$rows = mysqli_fetch_all($result, MYSQLI_ASSOC)

$i = 0;
while ($row = mysqli_fetch_array($result)) //Преобразование результата в понятный коду тип данных
{
    if ($name == $row['login'] && $password == $row['password'])
    {
        session_start();
        $_SESSION['login'] = $name;
        ++$i;
    }
}
if ($i > 0) header("Location: ../HTML/lk.html"); 
else 
{
    header("Location: index.html");
}


/*while ($row = mysqli_fetch_array($result)) 
{
    if ($name == $row['logg'] && $password == $row['pass'])
    {
    header("Location: Spravka.html");
    }
    else 
    {
        echo "EROR!";
        //
    }
}*/


//mysqli_close($conn);

?>