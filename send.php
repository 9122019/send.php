<?php

$post = [
	    'tel' => '+71234567890',
	    'city' => 'Нижний Новгород',
	    'question' => 'Как получить жилье от государства?'
];

$url = 'https://lawtask.ru/wh.php';
	
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_close ($ch);
