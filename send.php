<?php

/*$token = "7238360214:AAED9R27wBHgJVnU4nCw4LavUxrZ0L9gubA";

$chat_id = "170195649";

if ($_POST['act'] == 'order') {
    $name = ($_POST['id']);
    $phone = ($_POST['name']);
    $email = ($_POST['price']);
    $textarea = ($_POST['order']);

    $arr = array(
        'Имя:' => $name,
        'Телефон:' => $phone,
        'Почта' => $email,
        'Текст' => $textarea
    );
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

    if ($sendToTelegram) {
        echo($txt);
        alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
    }

    else {
        echo($txt);
        alert('Что-то пошло не так. ПОпробуйте отправить форму ещё раз.');
    }
}*/

if(isset($_POST['act']))
{
    $apiToken = "7238360214:AAED9R27wBHgJVnU4nCw4LavUxrZ0L9gubA";
    $data = [
        'chat_id' => '170195649',
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'order' => $_POST['order']
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
}
