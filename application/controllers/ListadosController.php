<?php
class ListadosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {

        // action body
        $ads = array();

        $repository = new Application_Model_Repository_Statement();
        $ads = $repository->fetchAllAds('1');

        //die('ADS: <pre>' . print_r($ads, true) . '</pre>');

        $this->view->ads = $ads;

    }

}

