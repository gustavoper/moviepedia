<?php


/**
 * Class Application_Model_Access
 *
 * This is a VERY SIMPLE implementation of MongoClient from PHP 5.6+
 *
 *
 */
class Application_Model_Access
{

    protected $mongo;
    protected $db = 'moviepedia';
    protected $collectionName = 'access';
    protected $collectionObject;


    public function __construct()
    {
        $this->mongo = new MongoClient("mongodb://10.11.10.2:27017");
        $this->collectionObject = $this->mongo->{$this->db}->{$this->collectionName};
    }

    public function getAll()
    {
        $accesses = array();
        $cursor = $this->collectionObject->find();
        $accessEntryCount=0;

        foreach ($cursor as $currentAccessEntry) {
            $accesses[$accessEntryCount]["id"]  = $accessEntryCount;

            $accesses[$accessEntryCount]['ipAddress']  = $currentAccessEntry['ipAddress'];
            $accesses[$accessEntryCount]['timestamp'] =  $currentAccessEntry['timestamp'];
            $accesses[$accessEntryCount]['pageUrl']=  $currentAccessEntry['pageUrl'];
            $accesses[$accessEntryCount]['method']=  $currentAccessEntry['method'];
            $accesses[$accessEntryCount]['protocol']=  $currentAccessEntry['protocol'];
            $accessEntryCount++;
        }
        return $accesses;
    }


    public function save()
    {
        $this->collectionObject->insert($this->fetchFields());
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

