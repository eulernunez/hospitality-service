<?php
require_once 'BaseSiteController.php';
class AltaPropietarioController extends BaseSiteController
{

    public function init()
    {
        /* Initialize action controller here */
        parent::init();
    }

    public function indexAction()
    {
        // action body
    }
    
    
    public function saveOwnerAction()
    {

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $post = $this->getRequest()->getPost();
        $post['active'] = '1';
        $post['createdDate'] = date("Y-m-d H:i:s");
        $owner = new Application_Model_DbTable_Owner();
        $lastInsertId = $owner->agregar($post);

        # SESSION
        $session = new Zend_Session_Namespace('adId');
        $session->id = $lastInsertId;
        
        
        $filesUploadForm = "<div style='width: 500px; height: 200px; border: 2px solid red;'></div>";
        //$this->view->headLink( )->appendStylesheet($this->view->baseUrl( ) . '/css/uploadify/uploadify.css');
        //$this->view->headScript( )->appendFile($this->view->baseUrl( ) . '/js/uploadify/jquery.uploadify.min.js', $type = 'text/javascript', $attrs = array());

        //$filesUploadForm = $this->view->partial('partials/alta-anuncio/upload-pics.phtml');

        echo $filesUploadForm;

    }    
    
    
    

}

