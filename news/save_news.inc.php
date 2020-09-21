<?php
require_once 'NewsDB.class.php';
if (count($_POST) < 4) {
    $errMsg = 'Заполните все поля формы!';
} else {
    $title = $news->clearStr($_POST['title']);
    $category = $news->clearInt($_POST['category']);
    $description = $news->clearStr($_POST['description']);
    $source = $news->clearStr($_POST['source']);
    if ($news->saveNews($title, $category, $description, $source)) {
        header("Location: news.php");
        exit();
    } else {
        $errMsg = "Ошибка при добавлении новости";
    }
}
