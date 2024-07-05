<?php

// Токен
  const TOKEN = '7238360214:AAED9R27wBHgJVnU4nCw4LavUxrZ0L9gubA';

  // ID чата
  const CHATID = '170195649';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $fileSendStatus = '';
  $textSendStatus = '';
  $msgs = [];

  // Проверяем не пусты ли поля с именем и телефоном
  if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['order'])) {

    // Если не пустые, то валидируем эти поля и сохраняем и добавляем в тело сообщения. Минимально для теста так:
    $txt = "";

    // Имя
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $txt .= "Имя пославшего: " . strip_tags(trim(urlencode($_POST['name']))) . "%0A";
    }

    // Номер телефона
    if (isset($_POST['price']) && !empty($_POST['price'])) {
        $txt .= "Телефон: " . strip_tags(trim(urlencode($_POST['price']))) . "%0A";
    }

    // Не забываем про тему сообщения
    if (isset($_POST['order']) && !empty($_POST['order'])) {
        $txt .= "Тема: " . strip_tags(urlencode($_POST['order']));
    }

    $textSendStatus = @file_get_contents('https://api.telegram.org/bot'. TOKEN .'/sendMessage?chat_id=' . CHATID . '&parse_mode=html&text=' . $txt);
  } else {
    echo json_encode('NOTVALID');
  }
} else {
  header("Location: /");
}
