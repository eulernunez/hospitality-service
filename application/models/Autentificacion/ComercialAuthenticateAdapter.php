<?php
class Application_Model_Autentificacion_ComercialAuthenticateAdapter implements Zend_Auth_Adapter_Interface
{
    
    private $correo = null;
    private $clave = null;
    private $claveCheck = null;
    private $infoComercial = array( );
    protected $system;

    
    
    public function __construct ($correo, $clave, $infoComercial)
    {
        $this->system = Application_Model_System_System::getInstance( );
        $this->correo = $correo;
        $this->clave = $clave;
        $this->claveCheck = $infoComercial['password'];
        $this->infoComercial = $infoComercial;
    }

    
    
    public function authenticate ( )
    {
//        $md5 = md5($this->clave);
//        $params = array('clave' => $this->clave,
//                        'clave md5' => $md5,
//                        'bd' => $this->claveCheck);
//        
//        die('<pre>' . print_r($params, true) . '</pre>');
        
        if( $this->claveCheck === md5( $this->clave )  ) {
            Zend_Session::rememberMe(14400);
            $activeUser = new Application_Model_Comercial($this->infoComercial);
            
            $results = array(
                                'authed' => true,
             			'activeUser' => serialize($activeUser)
                            );
            
            return new Application_Model_Autentificacion_AuthResult($results, null);
            
        } else {
            throw new Zend_Auth_Adapter_Exception('login user incorrect');
        }
    }

    
    
    
}