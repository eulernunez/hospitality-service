<?php
class Application_Model_DbTable_Contact extends Zend_Db_Table_Abstract
{

    protected $_name = 'contacts';

    protected $campos =  array(

        'name' => 'name',
        'phone' => 'phone',
        'email' => 'email',
        'subject' => 'subject',
        'message' => 'message',
        'created' => 'created',
        'state' => 'state'

    );

    public function listar()
    {

        return $this->fetchAll();

    }

    public function agregar($params)
    {

        foreach( $this->campos as $key => $value ) {
           $this->campos[$key] = $params[$value];
        }
        
        $this->insert($this->campos);

        return $this->getAdapter()->lastInsertId();

    }

    public function editar($params)
    {

        foreach( $this->campos as $key => $value ) {
           $this->campos[$key] = $params[$value] ;  
        }

        $this->update($this->campos, 'id = ' . (int) $params['id']);

        return true;

    }

    
    
 


}