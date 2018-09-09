<?php

class ContactUsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function sendMessageAction()
    {
        //date_default_timezone_set('America/Los_Angeles');
        $postParams = $this->getRequest()->getPost();

        $params = array();
        $params['mensaje']
                = utf8_decode('Datos del interesado:<br/>' .
                 'Nombre   : ' . $postParams['name'] . '<br/>' .
                 'Teléfono : ' . $postParams['phone'] . '<br/>' .
                 'E-mail   : ' . $postParams['email'] . '<br/>' .
                 'Asunto   : ' . $postParams['subject'] . '<br/><br/>' .

                 'Mensaje:<br/>' .
                 $postParams['message']);

        $params['para']   = 'admin@viajacon.es';
        $params['asunto'] = utf8_decode($postParams['subject']);
        
        $postParams['state'] = '1';
        $postParams['created'] = date("Y-m-d H:i:s");
        
        $contact = new Application_Model_DbTable_Contact();
        $lastInsertId = $contact->agregar($postParams);
       
        $sender = new Application_Model_System_System( );
        $sender->sendEmail($params);

    }

    public function sendMessageByAjaxAction()
    {
        
        $this->_helper->layout->disableLayout();
        // $this->_helper->viewRenderer->setNoRender(true);
        
        $postParams = $this->getRequest()->getPost();
        $params = array();
        
        $postParams['phone'] = 'NA';
        $postParams['subject'] = 'NA';
        
        $params['mensaje']
                = 'Datos del interesado:<br/>' .
                 'Nombre   : ' . $postParams['name'] . '<br/>' .
                 'Telefono : ' . $postParams['phone'] . '<br/>' .
                 'E-mail   : ' . $postParams['email'] . '<br/>' .
                 'Asunto   : ' . $postParams['subject'] . '<br/><br/>' .

                 'Mensaje:<br/>' .
                 $postParams['message'];

        $params['para']   = 'administrador@viajacon.es';
        $params['asunto'] = $postParams['subject'];

        $postParams['state'] = '1';
        $postParams['created'] = date("Y-m-d H:i:s");
        $contact = new Application_Model_DbTable_Contact();
        $lastInsertId = $contact->agregar($postParams);

        $sender = new Application_Model_System_System( );
        $sender->sendEmail($params);       
        
        
    }
    
    
    
}

