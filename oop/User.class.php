<?php

class User extends UserAbstract {
    public $name;
    public $login;
    public $password;
    public static $UserCount = 0;
    /**
     * User constructor.
     * @param $name
     * @param $login
     * @param $password
     */
    public function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        User::$UserCount++;
    }


    function showInfo() {
        echo "Name: $this->name Login: $this->login Password: $this->password<br/>\n";
    }

    public function  __destruct()
    {
        // TODO: Implement __destruct() method.
        echo "User: $this->name deleted<br/>\n";
    }

}
