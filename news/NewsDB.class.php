<?php
require_once 'INewsDB.class.php';
class NewsDB implements INewsDB {
    const DB_NAME = 'news.db';
    private $_db;

    /**
     * NewsDB constructor.
     * @param $_db
     */
    public function __construct()
    {
        $this->_db = new SQLite3(self::DB_NAME);
    }

    public function __destruct()
    {
        $this->_db->close();
    }


    /**
     * @return SQLite3
     */
    public function getDb()
    {
        return $this->_db;
    }
    function saveNews($title, $category, $description, $source)
    {
    }

    function getNews()
    {
        // TODO: Implement getNews() method.
    }

    function deleteNews($id)
    {
        // TODO: Implement deleteNews() method.
    }

}

$obj = new NewsDB();