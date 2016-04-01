<?php

class Application_Model_MovieMapper
{

    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Movie');
        }
        return $this->_dbTable;
    }



    public function save($model) {

    }
    public function find($id, $model) {

    }


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


}

