<?php
class Application_Model_System_System 
{

    private static $instance = null;
    protected $dbObject = null;
    public $view;
    public $body;
    
    public static function getInstance($class_name = 'Application_Model_System_System') 
    {

        if (!self::$instance) {

            self::$instance = new $class_name();
        }

        return self::$instance;

    }



    public function getDbObject( ) 
    {
        if ($this->dbObject != null) {
            return $this->dbObject;
        }

        $config = $this->getConfig();
        
        $this->dbObject = Zend_Db::factory( $config->resources->db->adapter,
                                            $config->resources->db->params);  

        $this->dbObject->query('SET NAMES UTF8');
        //die('dbObject: <pre>' . print_r($this->dbObject,true) . '</pre>'); 
        
        return $this->dbObject;
    }

    
    public function setView($view) {
        
        $this->view = $view;
        
    }    

    
    public function setPartial($partial) {
        $this->body = $this->view->partial($partial);
    }

    static function getConfig( ) 
    {
        
        $options['nestSeparator'] = '.' ;
        
        
        $config = new Zend_Config_Ini(  APPLICATION_PATH . '/configs/application.ini',
                                        constant('APPLICATION_ENV'), $options);

        
        return $config;
    }


    public function sendEmail( $params )
    {

//        EMAIL BY DEFAULT 
        $smtp = "smtp.1and1.es";
        $usuario = "admin@viajacon.es";
        $clave = "&?72880072Rtc$";  
        $de = "admin@viajacon.es";

        
// https://myaccount.google.com/security        
// https://myaccount.google.com/lesssecureapps?pli=1        
// Algunos dispositivos y aplicaciones utilizan una tecnología de inicio
// de sesión menos segura, lo cual hace que tu cuenta sea más vulnerable,
// por lo que te recomendamos que desactives el acceso de estas aplicaciones.
// Si, a pesar del riesgo que ello supone, quieres utilizarlas,
// puedes activar el acceso
// Permitir el acceso de aplicaciones menos seguras: SÍ

        //ALTERNATIVE
//        $smtp = "smtp.googlemail.com";
//        $usuario = "turistday@gmail.com";
//        $clave = "72880072";  
//        $de = "administrador@viajacon.es";

        try {

            $config = array (
                'auth' => 'login',
                'username' => $usuario,
                'password' => $clave,
                'ssl' => 'ssl',
                'port' => '465'  // check 587 Connection time out // 995 Connection refused   // 465 Connection time out KO BUT local OK
            );

            $mailTransport = new Zend_Mail_Transport_Smtp($smtp, $config);
            $mail = new Zend_Mail();
            $mail->setFrom($de);

            $mail->addTo($params['para']);
            //$mail->addTo($de);
            $mail->setBodyHtml($params['mensaje']);
            $mail->setSubject($params['asunto']);
            $mail->send($mailTransport);
            
        } catch (Exception $e){

            echo ('ERROR:<pre>'. print_r($e->getMessage(), true) . '</pre>');
            
                        
        }

   }
    
    
    
    public function logIn( $correo, $clave ) {
        
        try {

            $result = null;
            
            if (isset( $correo ) && isset( $clave )) {
                $auth = Zend_Auth::getInstance( );
                $systema = Application_Model_System_System::getInstance( );
                
                $result = $systema->getDbObject()
                          ->fetchRow('SELECT * FROM usuario WHERE email = ?', $correo );
                
                if (isset($result['password'])) {
                    $adapter = new Application_Model_Autentificacion_UserAuthenticateAdapter($correo, $clave, $result);
                    
                    $autenticado = $auth->authenticate($adapter);
                    
                    
                } 
                
                if ($autenticado != null) {
                    if ($autenticado->isValid() == true) {
                    } else {
                      $this->logOut( );
                      $this->_response->setRedirect( $this->view->baseUrl() . '/index/' )->sendResponse();
                    }
                }
            }
        
             
        } 
        catch (exception $e) {
            //$this->catchException($e);
            echo $e->getMessage() ;
        }
    }
 



    
    
    
    
    
    
    
    public function logOut( )
    {
            Zend_Auth::getInstance()->clearIdentity();
    }    
    
    /*
     * Try this code
     * 
     * 
     */

    public function getLoggedInUser() 
    {
        $identity = null;
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $identity = unserialize($auth->getIdentity());
        }

        return $identity;
    }
    
    
    
    
    

}