<?php

  const TOKEN = '7238360214:AAED9R27wBHgJVnU4nCw4LavUxrZ0L9gubA';
  const CHATID = '170195649';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  foreach($_SERVER as $arr) {
    echo($arr);
  }
  $fileSendStatus = '';
  $textSendStatus = '';
  $msgs = [];

  if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['order'])) {


    $txt = "";

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $txt .= "Имя пославшего: " . strip_tags(trim(urlencode($_POST['name']))) . "%0A";
    }

    if (isset($_POST['price']) && !empty($_POST['price'])) {
        $txt .= "Телефон: " . strip_tags(trim(urlencode($_POST['price']))) . "%0A";
    }

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
