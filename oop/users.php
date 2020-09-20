<?php
function __autoload($class) {
    require $class.'.class.php';
}

$user1 = new User('Alexander', 'alex', '111');
$user2 = new User('Mixail', 'miha', '222');
$user3 = new User('Vladimir', 'vova', '333');


$superUser1 = new SuperUser('Ivan', 'ivan', 'aaa', 'admin');

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

echo "All users: ".User::$UserCount."\n";
echo "All Super users: ".SuperUser::$SuperUsersCount."\n";

$superUser1->showInfo();
