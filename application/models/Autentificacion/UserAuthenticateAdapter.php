<?php
class Application_Model_Autentificacion_UserAuthenticateAdapter implements Zend_Auth_Adapter_Interface
{

    private $correo = null;
    private $clave = null;
    private $claveCheck = null;
    private $infoUser = array();
    protected $system;


    public function __construct ($correo, $clave, $infoUser)
    {
        $this->system = Application_Model_System_System::getInstance( );
        $this->correo = $correo;
        $this->clave = $clave;
        $this->claveCheck = $infoUser['password'];
        $this->infoUser = $infoUser;
    }


    public function authenticate ()
    {
        if( $this->claveCheck === md5( $this->clave )  ) {
            Zend_Session::rememberMe(14400);
            $activeUser = new Application_Model_Autentificacion_Usuario( $this->infoUser );
            $results = array(
                'authed' => true,
                'activeUser' => serialize($activeUser));
            return new Application_Model_Autentificacion_AuthResult($results, null);
        }   else  {
            throw new Zend_Auth_Adapter_Exception('Login User Incorrect');
        }
    }

}