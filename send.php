<?php

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
	error_log('Лид не был сохранён получателем');
	echo 'error';
	var_dump($response);
} else {
	echo 'Лид был успешно передан и сохранен получатаем';
}
