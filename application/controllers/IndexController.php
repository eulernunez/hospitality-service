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

        $comercialId = 1;
        // action body
        $repository = new Application_Model_Repository_Statement();
        $sections = $repository->getSections($comercialId);
        $places = $repository->getPlaces($comercialId);
        
        $isAdministrador = $this->view->isAdministrador;

        if('1' === $isAdministrador) {
            $state = '0';
        } else {
            $state = '1';
        }

        $ads = array();
        $ads = $repository->fetchAllAds($state);

        $this->view->ads = $ads;

        $this->view->adsUpdated = $repository->fetchAllAds('1');
        //die('<pre>' . print_r($repository->fetchAllAds('1'),true) . '</pre>');
        $this->view->section1 = isset($sections['0']['seccion'])?$sections['0']['seccion']:'';
        $this->view->section2 = isset($sections['1']['seccion'])?$sections['1']['seccion']:'';
        $this->view->section3 = isset($sections['2']['seccion'])?$sections['2']['seccion']:'';
        //die('<pre>' . print_r($repository->fetchAllAds('1'),true) . '</pre>');
        $this->view->place1 = isset($places['0']['place'])?$places['0']['place']:'';
        $this->view->place2 = isset($places['1']['place'])?$places['1']['place']:'';
        $this->view->place3 = isset($places['2']['place'])?$places['2']['place']:'';
        $this->view->place4 = isset($places['3']['place'])?$places['3']['place']:'';
        //die('PLACE: <pre>' . print_r($places, true) . '</pre>');
        
        $this->view->nombre = (string)$sections['0']['nombre'];

        $this->view->sections = $sections;

    }

}

