<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <title>Сокращение ссылок</title>
</head>

<body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

    <div class="elements">
        <div class="row">
            <h1>Сокращение ссылок</h1>
        </div>
        <form name="cutLinkForm" method="GET">
            <div class="link">
                <input type="text" name="cutLinkInp" id="cutLinkInp" placeholder="Вставьте ссылку" 
                style="width: 600px; height: 30px; font-size: unset;">
                <input type="submit" name="cutLinkSubmit" id="cutLinkSubmit" value="Сократить" 
                style="height: 30px; font-size: unset;" />
            </div>
        </form>
        <button name="copyText" onclick="copyText()">Скопировать</button>
    </div>
 <script src='main.js'></script>
</body>

</html>