<?php
require_once 'BaseSiteController.php';
class LoginController extends BaseSiteController
{

    protected $system = null;
    
    public function init()
    {
        /* Initialize action controller here */
        $this->system = Application_Model_System_System::getInstance( );
        parent::init( );        
    }

    public function indexAction()
    {
        // action body
    }

    public function usersAction()
    {

            $post = $this->getRequest()->getPost();
            $email = $post['email'];
            $password = $post['password'];
            
            
            if ( isset($email)  && isset($password) ) {
                
                $this->system->logIn( $email, $password );

               if ($this->system->getLoggedInUser() != null) {
                   
                    if ($this->system->getLoggedInUser() instanceof Application_Model_Autentificacion_Usuario) {
                            
                            //$tipoMenu = $this->system->getLoggedInUser( )->getMenuByUser( );
                            $tipoUsuario = $this->system->getLoggedInUser( )->getTypeUser( );
                            
                            if($tipoUsuario == 1){
                                $this->_response->setRedirect($this->view->baseUrl( ) . '/menu-usuario/')
                                    ->sendResponse( );
                            }else{
                                $this->_response->setRedirect($this->view->baseUrl( ) . '/')
                                    ->sendResponse( );
                            }
                        }
                        else { 
                            $this->_response->setRedirect($this->view->baseUrl( ) . '/')
                            ->sendResponse( );
                        }
               } else {
                        $this->_response->setRedirect($this->view->baseUrl( ).'/login/invalido-login');
               }                   
            }
        
        try
        {
            
        } 
        catch (exception $e)
        {
                //$this->system->catchException($e);
                echo $e->getMessage() ;
        }
            
    }

    public function logoutAction()
    {
        $this->system->logOut();

        $this->_response->setRedirect($this->view->baseUrl() . '/')
                         ->sendResponse();
    }


    public function invalidoLoginAction()
    {
        $this->_response->setRedirect($this->view->baseUrl( ) . '/')
                         ->sendResponse();
    }    
    
}



