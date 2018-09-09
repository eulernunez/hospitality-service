<?php
require_once 'BaseSiteController.php';
class SeoController extends BaseSiteController
{

    public function init()
    {
        /* Initialize action controller here */
        parent::init();
    }

    public function indexAction()
    {
        // action body
        $config = new Application_Model_Repository_Statement();
        $seo = $config->getSeoConfig();
        $this->view->seoConfig = $seo;
        
    }

    public function guardarSeoAction()
    {
        // action body
        $postParams = $this->getRequest()->getPost();
        
        $config = new Application_Model_DbTable_Seo();
        $lastInsertId = $config->agregar($postParams);

        
        
        
    }
    
}