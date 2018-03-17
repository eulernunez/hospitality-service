<?php
class Application_Model_Autentificacion_Usuario
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $isAdministrador;
    //protected $permissions = array('user.editUser.all' => true );

    public function __construct($userData) 
    {
       
        
        $this->id = $userData['id'];
        $this->name = $userData['name'];
        $this->email = $userData['email'];
        $this->password = $userData['password'];
        $this->isAdministrador = $userData['isAdministrador'];
    }
		
    public function dbOps()
    {
        return new Application_Model_User_DbOps();
    }

    public function getPermissions()
    {
        return $this->permissions;
    }   
    
    public function getId( )
    {
        return $this->id;
    }        
    
    public function getIsAdministrador()
    {
        return $this->isAdministrador;
    }
    
    public function getTipoUsuarioId( )
    {
       return $this->tipoUsuarioId; 
    }        
 
    public function getMenuByUser( )
    {
        $tipoUsuarioId = (int)$this->tipoUsuarioId;
        
        switch ($tipoUsuarioId) {
                case 1:
                        $menu = "/";
                        break;
                case 2:
                        $menu = "/particular/";
                        break;
                case 3:
                        $menu = "/profesional-otros-servicios/";
                        break;
                case 4:
                        $menu = "/profesional-otros-servicios-particular/";
                        break;
                case 6:
                        $menu = "/particular-varios/";
            }
    
        return $menu;    
    }
    
    
    public function getTypeUser( )
    {
        return (int)$this->tipoUsuarioId;
    }        
    
    
    
    
    
    
    public function getNameContacto( )
    {
        return $this->contacto . ' - ' . $this->contactoApellidos; 
    }        
    
    
    public function getCorreoElectronico( )
    {
        return $this->correoElectronico;
    }
    
}

