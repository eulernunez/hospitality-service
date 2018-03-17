<?php

require_once 'BaseSiteController.php';
class IndexController extends BaseSiteController
{

    protected $system = null;

    public function init()
    {
        /* Initialize action controller here */
        $this->system = Application_Model_System_System::getInstance();
        parent::init();
    }

    public function indexAction()
    {

        
        // action body
        $ads = array();
        $repository = new Application_Model_Repository_Statement();

        
        
        $isAdministrador = $this->view->isAdministrador;

        if('1'===$isAdministrador) {
            $state = '0';
        } else {
            $state = '1';
        }

        $ads = $repository->fetchAllAds($state);

        //die('<pre>' . print_r($ads,true) . '</pre>');
        $this->view->ads = $ads;

    }


}

