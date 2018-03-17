<?php
require_once 'BaseSiteController.php';
class AltaPublicacionController extends BaseSiteController
{

    public function init()
    {
        /* Initialize action controller here */
        parent::init();
    }

    public function indexAction()
    {
        // TODO:
    }

    public function savePublicationAction()
    {

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $post = $this->getRequest()->getPost();
        
        $post['active'] = '1';
        $post['created-date'] = date("Y-m-d H:i:s");
        
        $publication = new Application_Model_DbTable_Publication();
        
        
        $lastInsertId = $publication->agregar($post);
        
        # SESSION
        $session = new Zend_Session_Namespace('publicationId');
        $session->id = $lastInsertId;

        $filesUploadForm = $this->view->partial('partials/alta-publicacion/upload-pics.phtml');
        echo $filesUploadForm;
        
    }
    
}