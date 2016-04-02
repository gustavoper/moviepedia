<?php

class Application_Model_MovieMapper
{

    protected $dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->dbTable) {
            $this->setDbTable('Application_Model_dbTable_Movie');
        }
        return $this->dbTable;
    }



    public function save($model) {

    }
    public function find($id, $model) {

    }

    /**
     * @return array
     */
    public function fetchAll() {
        $resultSet = $this->getDbTable()->fetchAll();

        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Movie();
            $entry->setId($row->id);
            $entry->setName($row->name);
            $entry->setGenre($row->genre);
            $entry->setLaunchYear(date("Y",strtotime($row->launchyear)));
            $entry->setPublisher($row->publisher);
            $entries[] = $entry;
        }
        return $entries;

    }

    /**
     * @param Application_Model_Movie $movie
     */
    public function insert(Application_Model_Movie $movie) {
        $tbl = $this->getDbTable();

        $data["genre"] = $movie->getGenre();
        $data["launchyear"] = $movie->getLaunchYear();
        $data["name"] = $movie->getName();
        $data["plot"] = $movie->getPlot();
        $data["publisher"] = $movie->getPublisher();
        $tbl->insert($data);
        //return $tbl->lastInsertId();
    }

}

