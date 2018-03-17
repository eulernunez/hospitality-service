<?php
class Application_Model_Autentificacion_AuthResult extends Zend_Auth_Result
{
    
    private $authValid = false;
    private $authedIdentity = null;

    public function __construct( $results )
    {
        if($results['authed'] == true) {
          $this->authValid  = true;
          $this->authedIdentity = $results['activeUser'];
        }
    }


    public function isValid( )
    {
        return $this->authValid;
    }
    
    
    public function getIdentity( )
    {
        return $this->authedIdentity;
    }
    
}