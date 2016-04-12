<?php

class Application_Model_DbTable_Ssh extends Zend_Db_Table_Abstract
{

    protected $_name = 'remoteCollector';




    public function getRemoteCollector($id=null)
    {
    	$rowParam = null;
    	if ($id!==null) {
    		$rowParam = 'id = '.$id;
            return $this->fetchRow($rowParam)->toArray();
    	}
        return $this->fetchAll();
    }




    public function addRemoteCollectorEntry($data) 
    {
    	$this->insert($data);
    }

}

