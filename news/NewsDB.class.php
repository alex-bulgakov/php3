<?php
require_once 'INewsDB.class.php';

class NewsDB implements INewsDB
{
    const DB_NAME = 'news.db';
    private $_db;

    /**
     * NewsDB constructor.
     * @param $_db
     */
    public function __construct()
    {
        if (!file_exists(self::DB_NAME)) {
            $this->_db = new SQLite3(self::DB_NAME);

            $this->_db->exec("
                    CREATE TABLE msgs(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    title TEXT,
                    category INTEGER,
                    description TEXT,
                    source TEXT,
                    datetime INTEGER
                    )");
            $this->_db->exec("
                    CREATE TABLE category(
                        id INTEGER,
                        name TEXT
                    )");
            $this->_db->exec("INSERT INTO category(id, name) 
                                    SELECT 1 as id, 'Политика' as name
                                    UNION SELECT 2 as id, 'Культура' as name
                                    UNION SELECT 3 as id, 'Спорт' as name");

            $this->_db->lastErrorMsg();
        } else {
            $this->_db->open(self::DB_NAME);
        }
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