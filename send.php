<?php

$post = [
	'self.key' => '12345',
	'self.name' => 'Иванов Иван Иванович',
	'self.phone' => '+71234567890',	// в любом формате
	'self.city' => 'Нижний Новгород',
	'self.region' => 'Нижегородская область',
	'self.question' => 'Как получить жилье от государства?'
];

$url = 'https://lawtask.ru/wh.php';
	
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_close ($ch);
