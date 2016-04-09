<?php

class Application_Model_DbTable_Publisher extends Zend_Db_Table_Abstract
{

    protected $_name = 'publisher';



    public function getPublisher($id=null)
    {
    	$rowParam = null;
    	if ($id!==null) {
    		$rowParam = 'id = '.$id;
            return $this->fetchRow($rowParam)->toArray();
    	}
        return $this->fetchAll();
    }


	/**
 	* 
 	*/
    public function addPublisher($data) 
    {
    	$insertData = $this->fetchFields($data);
    	$this->insert($insertData);
    }


    /**
    *
    */
    public function editPublisher($id,$data) 
    {
    	$updateData = $this->fetchFields($data);
    	$this->update($updateData,"id = ".intval($id));

    }

    /**
    *
    */
    public function deletePublisher($id) 
    {
    	$this->delete("id = ".intval($id));
    }


    /**
    *
    */
    public function fetchFields($data)
    {
    	$dbFields = array(
    		"id",	
			"name",	
			"description");

    	foreach ($dbFields as $fields) {
    		if (in_array($data[$fields],$data)) {
    			$dbFilledFields[$fields] = $data[$fields];
    		}
    	}
    	return $dbFilledFields;
    }

}

