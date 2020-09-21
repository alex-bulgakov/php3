<?php

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
        $this->_db = new SQLite3(self::DB_NAME);
        if (!file_exists(self::DB_NAME)) {
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
            $this->_db->exec("
                INSERT INTO msgs(title, category, descritpion, source, datetime)
                VALUES ('Заголовок новости', 1, 'Описание новости', 'Источник новости', time())
            ");
        }
    }

    public function __destruct()
    {
        unset($this->_db);
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
        $dt = time();
        $sql = "INSERT INTO msgs(title, category, description, source, datetime)
                VALUES ('$title', $category, '$description', '$source', $dt)";
        return $this->_db->exec($sql);
    }

    function getNews()
    {
        $sql = "SELECT msgs.id as id, title, category.name as category,
                description, source, datetime
                FROM msgs, category
                WHERE category.id = msgs.category
                ORDER BY msgs.id DESC";

        $q = $this->_db->query($sql);
        $result = [];
        while ($row = $q->fetchArray(SQLITE3_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    function deleteNews($id)
    {
        // TODO: Implement deleteNews() method.
    }

    function clearStr($data) {
        return trim(strip_tags($this->_db->escapeString($data)));
    }

    function clearInt($data) {
        return abs((int) $data);
    }

}



