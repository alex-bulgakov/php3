<?php
$arr_news = $news->getNews();
if (!$arr_news) {
    $errMsg = "Ошибка при выдаче новостной ленты";
} else {
    foreach ($arr_news as $item) {
        foreach ($item as $i) {
            echo $i.' ';
        }
        echo '<br/>';
    }
}
