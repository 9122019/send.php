<?php

/*

Передать лида можно POST методом на https://lawtask.ru/wh.php
Ниже представлен готовый код для этого.
Важно корректно указать ключи передаваемого массива. 
Требований к значениям - нет.
Так, например, $_POST['key'] может быть любой строкой или целочисленным.

*/

// собираем

$post = [
	'key' => '12345',
	'name' => 'Иванов Иван Иванович',
	'phone' => '+71234567890',	// в любом формате
	'city' => 'Нижний Новгород',
	'region' => 'Нижегородская область',
	'question' => 'Как получить жилье от государства?'
];

// очищаем

foreach ($post as $key => $value) {
	$post[$key] = htmlspecialchars($value);
}

// отправляем

$url = 'https://lawtask.ru/wh.php';
	
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close ($ch);

// проверяем

if ($response != true) {
	error_log('Send or save error');
	echo 'Лид не был сохранён получателем';
} else {
	echo 'Лид был успешно передан и сохранен получатаем';
}

/*

На стророне CRM происходит следующее: 
Принимается POST запрос, проверяются и очищаются данные. 
CRM пытается сохранить лида даже если часть информации отсутсвует. 
Если есть хоть что-то и это удалось сохранить - возвращает true. 
В противном случае, возвращает текст ошибки. 

Прочитать ошибку можно так:

echo <pre>;
var_dump($response);
echo </pre>;

*/
