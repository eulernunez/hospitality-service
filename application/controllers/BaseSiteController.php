<?php
//define('BASE_CONTROLLER_LOADED', true);
class BaseSiteController extends Zend_Controller_Action
{

    protected $system;
    protected $activeSession;
    protected $handler;

    public function init()
    {

        parent::init();

        $this->system = Application_Model_System_System::getInstance();
        //$this->handler = new Application_Model_Repository_Statement();

        //$this->system->setView($this->view);
        //$this->system->setController($this);
        // $this->view->urlBasePics = $this->system->getConfig( )->url->pics->anuncios;
        $this->securityCheck();
        $this->securityCheckSales();

    }


    public function securityCheckSales() {

        if ($this->system->getLoggedInUser( ) instanceof Application_Model_Comercial) {
            $this->view->logIn = true;
        }

    }
    
    
    
    
    public function securityCheck ()
    {

        
        $this->_controller = $this->getRequest()->getControllerName();
        $this->view->currentController = $this->_controller;

        if ($this->checkSession()) {
            $this->activeSession = null;
            
            if ($this->system->getLoggedInUser() instanceof Application_Model_Autentificacion_Usuario) {
               
                $this->activeSession['ownMenu'] = $this->view->baseUrl( ) . '/menu-usuario/';
                $this->view->logIn = true;
                $this->view->userId = $this->system->getLoggedInUser( )->getId( );
                
                
                $this->view->isAdministrador = $this->system->getLoggedInUser( )->getIsAdministrador( );
                $this->activeSession['logIn'] =  $this->view->logIn;
                $this->activeSession['userId'] =  $this->view->userId;
                $this->activeSession['isAdministrador'] =  $this->view->isAdministrador;
            //$this->view->sessionBox = $this->view->partial('/partials/activeSessionBox.phtml', $activeSession);
            }
        }
        else { 
            if ( ($this->_controller != 'index') &&
                 ($this->_controller != 'error') &&
                 ($this->_controller != 'login') &&
                 ($this->_controller != 'habitacion')        
                         
               )
                   { 
                       // user is not located on allowed controller
                       $this->_response->setRedirect($this->view->baseUrl() . '/')
                             ->sendResponse();
                             die();
                   }
        }

    }
    
    
    
    private function checkSession ()
    {   
        $auth = Zend_Auth::getInstance( );
        if ($auth->hasIdentity( ))  {
            // Identity exists; get it
            // $identity = $auth->getIdentity( );
             return true;
        }
        
     
        
        /*
        if (empty(Application_Model_System_System::getSession( )->username))    {
            $sessionBoxVals = array();
            if(isset($this->redirectUrl)) {
                $sessionBoxVals['redirectUrl'] = $this->redirectUrl;
            }
            $sessionBoxVals['cookieLoginEmail'] = $this->captureLastLogin( );
            if( empty( $sessionBoxVals['cookieLoginEmail'] ) ) $sessionBoxVals['cookieLoginEmail'] = 'Correo electrónico';
            $this->view->sessionBox = $this->view->partial('/partials/sessionLoginBox.phtml',$sessionBoxVals);
        }
        */
    }
    
    
    
    public function postDispatch()
    {
        /*
        $this->view->headTitle('Hoteles Barcelona alojamiento 4 estrellas desde 30 € turismo económico', 'PREPEND');
        $this->view->headMeta()->setName('description', 'Barcelona alojamiento hotel  de 4 estrellas desde 30 € para turismo económico barato low cost para vacaciones por días hotel de 2 3 4 5 estrellas turisdays');
        */
        /*Fijos*/
        $this->view->headMeta()->setHttpEquiv('Content-Type', 'text/html; charset=utf-8');
        /*
        $this->view->headMeta()->appendHttpEquiv('expires','Wed, 26 Feb 1997 08:21:57 GMT')
		 ->appendHttpEquiv('pragma', 'no-cache')
                 ->appendHttpEquiv('Cache-Control', 'no-cache');

        */
        $this->view->headMeta()->setName('keywords', 'Hoteles en Barcelona alojamiento low cost desde 30€ día - disfrute del mejor turismo y vacaciones en alojamiento barato y económico en un hotel elegante y acogedor');
        
    }
    
}