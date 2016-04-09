<?php

class Application_Model_DbTable_Access extends Zend_Db_Table_Abstract
{

    protected $_name = 'access';


    public function getAccess($id=null)
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
    public function addAccess() 
    {
    	$insertData = $this->fetchFields();
    	$this->insert($insertData);
    }



    public function fetchFields()
    {
    	$dbFields = array(
			"ipAddress"=>$_SERVER['REMOTE_ADDR'],	
			"timestamp"=>date('Y-m-d h:i:s'),
			"pageUrl"=>$_SERVER['PHP_SELF'],
			"method"=>$_SERVER['REQUEST_METHOD'],
			"protocol"=>$_SERVER['SERVER_PROTOCOL']);

    	return $dbFields;
    }

}

