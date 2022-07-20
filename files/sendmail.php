<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setFrom('nikitkagovoruhina@mail.ru', 'Привет');
	//Кому отправить
	$mail->addAddress('flatworker@mail.ru');
	//Тема письма
	$mail->Subject = 'Работает!!!!';

	//Тело письма
	$body = '<h1>Привет!</h1>';
	$body = '<p>Имя:' .&_POST['userName']'</p>'

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>