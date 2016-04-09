<?php

class Application_Model_DbTable_Genre extends Zend_Db_Table_Abstract
{

    protected $_name = 'genre';



    public function getGenre($id=null)
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
    public function addGenre($data) 
    {
    	$insertData = $this->fetchFields($data);
    	$this->insert($insertData);
    }


    /**
    *
    */
    public function editGenre($id,$data) 
    {
    	$updateData = $this->fetchFields($data);
    	$this->update($updateData,"id = ".intval($id));

    }

    /**
    *
    */
    public function deleteGenre($id) 
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

