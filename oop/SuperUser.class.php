<?php

class SuperUser extends User implements ISuperUser {
    public $role;
    public static $SuperUsersCount = 0;

    /**
     * SuperUser constructor.
     * @param $role
     */
    public function __construct($name, $login, $password, $role)
    {
        parent::__construct($name, $login, $password);
        $this->role = $role;
        SuperUser::$SuperUsersCount++;
    }

    public function showInfo()
    {
        echo "Name: $this->name Login: $this->login Password: $this->password Role: $this->role\n";
    }


    function getInfo()
    {
        // TODO: Implement getInfo() method.
        $result = [];

    }
}
