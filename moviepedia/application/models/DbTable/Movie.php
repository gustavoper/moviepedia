<?php

class Application_Model_DbTable_Movie extends Zend_Db_Table_Abstract
{

    protected $_name = 'movie';



    public function getMovie($id=null)
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
    public function addMovie($data) 
    {
    	$insertData = $this->fetchFields($data);
    	$this->insert($insertData);
    }


    /**
    *
    */
    public function editMovie($id,$data) 
    {
    	$updateData = $this->fetchFields($data);
    	$this->update($updateData,"id = ".intval($id));

    }

    /**
    *
    */
    public function deleteMovie($id) 
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
			"genreId",
			"publisherId",
			"launchYear",
			"plot",
			"billboard");

    	foreach ($dbFields as $fields) {
    		if (in_array($data[$fields],$data)) {
    			$dbFilledFields[$fields] = $data[$fields];
    		}
    	}
    	return $dbFilledFields;
    }

}

