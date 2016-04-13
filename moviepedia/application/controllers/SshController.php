<?php


/**
 * Class SshController
 *
 * A simple implementation of ssh2 PHP library.
 *
 * Next steps:
 *
 * 1 - improve connection through public/private keys
 * 2 - allow user to choose encrypt algorithm
 * 3 - log all errors / attempts
 */
class SshController extends Zend_Controller_Action
{

    private $host = null;
    private $username = null;
    private $password = null;
    private $port = null;
    private $sshConnection = null;
    private $inFilePath = null;
    private $outFilePath = null; 
    private $inFileName = null;
    private $outFileName = null;
    private $currentTimestamp = null;


    public function init()
    {
        /* Initialize action controller here */
        $this->currentTimestamp = date("Ymdhis");
        $access = new Application_Model_Access();
        $access->save();

    }

    public function indexAction()
    {
        // action body
        $sshAccess = new Application_Model_DbTable_Ssh();
        $this->view->sshAccess = $sshAccess->getRemoteCollector();

      
    }

    public function connectAction()
    {
        //setting full outputfilename

        try {
            if (!$this->setConnection()) {
                throw new Exception("UNABLE_TO_CONNECT");
            }
            if (!$this->doAuth()) {
                throw new Exception("AUTH_FAILED");
            }
            if (!$this->doCopy()) {
                throw new Exception("COPY_FAILED");   
            }
            $this->_helper->redirector('index');

        } catch (Exception $e) {
            throw new Exception ($e->getMessage());
        }
        //connecting...

        //ssh2_disconnect($this->sshConnection);

    }

    public function copyAction()
    {
        // action body
        $form = new Application_Form_Copy();
        $form->submit->setLabel('Conectar & Salvar');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
                $formData = $this->getRequest()->getPost();
                if ($form->isValid($formData)) {
                    $this->host = $form->getValue("host"); 
                    $this->port = $form->getValue("port"); 
                    $this->username = $form->getValue("username"); 
                    $this->password = $form->getValue("password");
                    


                    //getting file names and paths...
                    $this->inFilePath = $this->getRealFilePath($form->getValue("origin"));
                    $this->inFileName = $this->getRealFileName($form->getValue("origin"));

                    $this->outFilePath = $form->getValue("destination");
                    //$this->outFileName = $this->getRealFileName($form->getValue("destination"));

                    $this->connectAction();

                }
                else {
                    $form->populate($formData);
                }
        }
    }

    public function listAction()
    {
        //Listing all capture files and their diffs...
    }




    /***
    * getters and setters (if needed)
    */


    public function setConnection()
    {
        $this->sshConnection = ssh2_connect($this->host,$this->port);
        if (!$this->sshConnection) {
            return null;
        }
        return true;
    }


    public function doAuth()
    {
        return (ssh2_auth_password($this->sshConnection,$this->username,$this->password))?true: null;
    }


    public function doCopy()
    {

        //creating output folder if not exists
        if (!is_dir($this->outFilePath."/".$this->currentTimestamp)) {
            mkdir($this->outFilePath."/".$this->currentTimestamp);
        }



        if (!ssh2_scp_recv($this->sshConnection, 
                $this->inFilePath."/".$this->inFileName,
                $this->outFilePath."/".$this->currentTimestamp."/".$this->inFileName)) {
            return null;
        }

        copy($this->outFilePath."/".$this->currentTimestamp."/".$this->inFileName,
            $this->outFilePath."/".$this->currentTimestamp."/".$this->inFileName.".diff");
            
            //registering copy operation into db...
            $sshEntry = new Application_Model_DbTable_Ssh();

            $insertData = array(
                                "host"=>$this->host,
                                "username"=>$this->username,
                                "port"=>$this->port,
                                "origin"=>$this->inFilePath."/".$this->inFileName,
                                "destination"=>$this->outFilePath.$this->currentTimestamp."/".$this->inFileName.".diff"
                                );
            $sshEntry->addRemoteCollectorEntry($insertData);


        return true;

    }

    public function getRealFileName($fullPath)
    {
        return basename($fullPath);
    }

    public function getRealFilePath($fullPath) {
        return dirname($fullPath);
    }


}







