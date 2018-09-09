<?php
require_once 'BaseSiteController.php';
class ComentarioController extends BaseSiteController
{

    public function init()
    {
        /* Initialize action controller here */
        //parent::init();
    }

    public function indexAction()
    {
        
        // action body
    }
    
    public function sendCommentAction()
    {
        //date_default_timezone_set('America/Los_Angeles');
        $postParams = $this->getRequest()->getPost();

//        $params = array();
//        $params['mensaje']
//                = utf8_decode('Datos del interesado:<br/>' .
//                 'Nombre   : ' . $postParams['name'] . '<br/>' .
//                 'Teléfono : ' . $postParams['phone'] . '<br/>' .
//                 'E-mail   : ' . $postParams['email'] . '<br/>' .
//                 'Asunto   : ' . $postParams['subject'] . '<br/><br/>' .
//
//                 'Mensaje:<br/>' .
//                 $postParams['message']);
//
//        $params['para']   = 'admin@viajacon.es';
//        $params['asunto'] = utf8_decode($postParams['subject']);
        
        $postParams['client-id'] = 265;
        $postParams['fecha'] = date("Y-m-d H:i:s");
        $postParams['activo'] = '1';
        
        
        $contact = new Application_Model_DbTable_Comment();
        $lastInsertId = $contact->agregar($postParams);
        
//        die('LAST_INSERT_COMMENT: <pre>' . print_r($lastInsertId, true) . '</pre>');
        
//        $sender = new Application_Model_System_System( );
//        $sender->sendEmail($params);

    }
    
    
    

}

