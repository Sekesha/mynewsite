<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reg</title>
    <link rel="stylesheet" href="/template/css/style.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="header_content">
            <div>
                <a href="/">главная</a>
                <a href="#">о нас</a>
            </div>
            <div>
                <a href="#">корзина</a>
                <?php if(!isset($_SESSION['user'])):?>
                    <a href="/register">Регистрация</a>
                    <a href="/login">Войти</a>
                <?php else: ?>
                    <a href="/logout">Выйти</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div>
        <div class="block">
