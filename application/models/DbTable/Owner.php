<?php
class Application_Model_DbTable_Owner extends Zend_Db_Table_Abstract 
{

    protected $_name = 'owners';

    protected $campos =  array(

        'name' => 'name',
        'dni' => 'dni',
        'telephone' => 'telephone',
        'mobile' => 'mobile',
        'email' => 'email',
        'address' => 'address',
        'zip' => 'zip',
        'city' => 'city',
        'country' => 'country',
        'created_date' => 'createdDate',
        'active' => 'active'

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