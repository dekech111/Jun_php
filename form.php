<?php
header('Access-Control-Allow-Origin: *');
$req = $_GET["cutLinkInp"];
$abr = "";
$lk = "";
$linkFount = false;
if (!empty($req)) {
    if (stristr($req, 'https') == false || stristr($req, "http") == false) {
        die("Не корректная ссылка!");
    }

    $linkes = file("linkes.txt");
    foreach ($linkes as $links) {

        //Нахождение вводимой ссылки
        $lk = stristr($links, "http");

        //Нахождение сокращённой ссылки
        $abr = stristr($lk, "localhost/");

        $lk = stristr($lk, ";", true);

        // -- /\--

        //Нашёл нужную ссылку
        if ($req == $lk) {
            echo $abr;
            $linkFount = true;
            break;
        } else
            //Ищет нужную ссылку
            continue;
    }
    // -- /\--

    //Ни одна ссылка не подошла
    if ($linkFount == false) {
        //Нахождение последнего id
        $i = stristr($links, ";", true) + 1;
        //Добавление данных в файл
        $fh = fopen("linkes.txt", "a");
        $addAbr = $_SERVER['HTTP_HOST'] . "/" . genAbbreviation();
        fwrite($fh, "$i;$req;$addAbr \n");
        fclose($fh);
        echo $addAbr;
    }
} else {
    $linkes = file("linkes.txt");
    $foundLink = false;
    $URI = $_SERVER['REQUEST_URI'];
    $obrlink = trim(stristr($URI, "localhost/"));
    //$obrlink = "localhost/hZkKV8V"; //проверка перехода на прямую.
    
    foreach ($linkes as $links) {
        //Нахождение целой ссылки
        $lk = stristr($links, "http");

        //Нахождение сокращённой ссылки
        $abr = trim(stristr($lk, "localhost/"));

        $lk = stristr($lk, ";", true);

        // -- /\--
        //Нашёл нужную ссылку
        if ($obrlink == $abr) {
            $foundLink = true;
            break;
        } else  //Ищет нужную ссылку
            continue;
    }
    if ($foundLink == true) {
        header("Location: ". $lk);
    } else
        die("Ссылка не найдена!");
}

//генерация уникальной ссылки
function genAbbreviation()
{
    $minChar = 6;
    $maxChar = 10;
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDFEGHIJKLMNOPRSTUVWXYZ0123456789';
    $new_chars = str_split($chars);

    $abr = "";
    $rand_char = mt_rand($minChar, $maxChar);
    for ($i = 0; $i < $rand_char; $i++) {
        $abr .= $new_chars[mt_rand(0, sizeof($new_chars) - 1)];
    }
    return $abr;
}
