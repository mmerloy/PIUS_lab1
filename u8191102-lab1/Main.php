<?php

require_once './User.php';
require_once './Comment.php';

    $datetime = new DateTime('2022-03-03T15:03:01.012345Z');

    $obj1 = new User(1000002, 'name', 'email', 'password');
    $comment1= new Comment($obj1, 'comment1');

    $obj2 = new User(1036347, 'Name1', 'email@email.com', 'password1P&');
    $comment2 = new Comment($obj2, 'comment2');

    $obj3 = new User(1036300, 'Name2', 'email@email.com', 'password1P&');
    $comment3 = new Comment($obj3, 'comment3');
    echo 'Успешно!пользователь прошел валидацию .'."<br>";

    $arr = [$comment1, $comment2, $comment3];

    foreach ($arr as $item) {
        if ($item->getObj()->getMydatetime() > $datetime) {
            echo $item->getObj()->getMydatetime()->format('Y-m-d h-m-s')."<br>";
        }
    }
