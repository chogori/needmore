<?php
  $SQL_DATABASE = 'mtpox';
  $SQL_USER = 'root';//'mtpox';
  $SQL_PASSWORD = 'root';//'200000buttcoins';
  $link = mysqli_connect('localhost', $SQL_USER, $SQL_PASSWORD, $SQL_DATABASE);
  if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;

?>
